<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{

    public function ViewShift()
    {
        $data['all_data'] = StudentShift::all();

        return view('backend.setup.student_shift.view_shift', $data);
    }

    public function StudentShiftAdd()
    {
        return view('backend.setup.student_shift.add_shift');
    }

    public function StudentShiftStore(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftEdit($id)
    {
        $edit_data = StudentShift::find($id);

        return view('backend.setup.student_shift.edit_shift',compact('edit_data'));
    }

    public function StudentShiftUpdate(Request $request, $id)
    {
        $data = StudentShift::find($id);

        $validate_data = $request->validate([
            'name' => 'required|unique:student_shifts,name, '.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftDelete($id)
    {
        $delete_data = StudentShift::find($id);
        $delete_data->delete();

        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('student.shift.view')->with($notification);
    }
}
