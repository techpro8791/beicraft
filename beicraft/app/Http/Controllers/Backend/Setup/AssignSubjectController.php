<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{

    public function ViewAssignSubject()
    {

        $data['all_data'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject', $data);
    }

    public function AssignSubjectAdd()
    {
        $data['school_subjects'] = SchoolSubject::all();
        $data['student_classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }

    public function AssignSubjectStore(Request $request)
    {
        $count_subject = count($request->subject_id);

        if ($count_subject != NULL) {
            for ($i=0; $i < $count_subject; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }
        }

        $notification = array(
            'message' => 'Subject Asseigned to Class Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('assign.subject.view')->with($notification);
    }

    public function AssignSubjectEdit($class_id)
    {
        $data['edit_data'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        // dd($data['edit_data']->toArray());
        $data['school_subjects'] = SchoolSubject::all();
        $data['student_classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject', $data);
    }

    public function AssignSubjectUpdate(Request $request, $class_id)
    {
        if ($request->subject_id == NULL) {
            $notification = array(
                'message' => 'Ooops! Items to update are required.',
                'alert-type' => 'error'
            );

            return Redirect()->route('assign.subject.edit', $class_id)->with($notification);
        }else {
            $count_class = count($request->subject_id);

            # delete previous data before updating
            AssignSubject::where('class_id', $class_id)->delete();
            # update data
            for ($i=0; $i < $count_class; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }
        }

        $notification = array(
            'message' => 'Data Updated Successfully.',
            'alert-type' => 'success'
        );

        return Redirect()->route('assign.subject.view', $class_id)->with($notification);
    }

    public function AssignSubjectDetails($class_id)
    {
        $data['details_data'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();

        return view('backend.setup.assign_subject.details_assign_subject', $data);
    }
}
