<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function ViewGroup()
    {
        $data['all_data'] = StudentGroup::all();

        return view('backend.setup.student_group.view_group', $data);
    }

    public function StudentGroupAdd()
    {
        return view('backend.setup.student_group.add_group');
    }

    public function StudentGroupStore(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id)
    {
        $edit_data = StudentGroup::find($id);

        return view('backend.setup.student_group.edit_group',compact('edit_data'));
    }

    public function StudentGroupUpdate(Request $request, $id)
    {
        $data = StudentGroup::find($id);

        $validate_data = $request->validate([
            'name' => 'required|unique:student_groups,name, '.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id)
    {
        $delete_data = StudentGroup::find($id);
        $delete_data->delete();

        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('student.group.view')->with($notification);
    }
}
