<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    # Conosector
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function ViewClass()
    {
        $data['all_data'] = StudentClass::all();

        return view('backend.setup.student_class.view_class', $data);
    }

    public function StudentClassAdd()
    {
        return view('backend.setup.student_class.add_class');
    }

    public function StudentClassStore(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassEdit($id)
    {
        $edit_data = StudentClass::find($id);

        return view('backend.setup.student_class.edit_class',compact('edit_data'));
    }

    public function StudentClassUpdate(Request $request, $id)
    {
        $data = StudentClass::find($id);

        $validate_data = $request->validate([
            'name' => 'required|unique:student_classes,name, '.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassDelete($id)
    {
        $delete_data = StudentClass::find($id);
        $delete_data->delete();

        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('student.class.view')->with($notification);
    }
}
