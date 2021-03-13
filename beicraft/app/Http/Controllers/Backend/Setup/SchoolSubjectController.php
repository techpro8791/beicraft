<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    # Conosector
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function ViewSchoolSubject()
    {
        $data['all_data'] = SchoolSubject::all();

        return view('backend.setup.school_subject.view_school_subject', $data);
    }

    public function SchoolSubjectAdd()
    {
        return view('backend.setup.school_subject.add_school_subject');
    }

    public function SchoolSubjectStore(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('school.subject.view')->with($notification);
    }

    public function SchoolSubjectEdit($id)
    {
        $edit_data = SchoolSubject::find($id);

        return view('backend.setup.school_subject.edit_school_subject',compact('edit_data'));
    }

    public function SchoolSubjectUpdate(Request $request, $id)
    {
        $data = SchoolSubject::find($id);

        $validate_data = $request->validate([
            'name' => 'required|unique:school_subjects,name, '.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('school.subject.view')->with($notification);
    }

    public function SchoolSubjectDelete($id)
    {
    $delete_data = SchoolSubject::find($id);
    $delete_data->delete();

    $notification = array(
        'message' => 'Subject Deleted Successfully',
        'alert-type' => 'info'
    );

    return Redirect()->route('school.subject.view')->with($notification);
    }
}
