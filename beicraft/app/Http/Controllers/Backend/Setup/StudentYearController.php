<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{

    public function ViewYear()
    {
        $data['all_data'] = StudentYear::all();

        return view('backend.setup.student_year.view_year', $data);
    }

    public function StudentYearAdd()
    {
        return view('backend.setup.student_year.add_year');
    }

    public function StudentYearStore(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearEdit($id)
    {
        $edit_data = StudentYear::find($id);

        return view('backend.setup.student_year.edit_year',compact('edit_data'));
    }

    public function StudentYearUpdate(Request $request, $id)
    {
        $data = StudentYear::find($id);

        $validate_data = $request->validate([
            'name' => 'required|unique:student_years,name, '.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearDelete($id)
    {
        $delete_data = StudentYear::find($id);
        $delete_data->delete();

        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('student.year.view')->with($notification);
    }
}
