<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\MarksGrade;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarkSheetController extends Controller
{
    public function MarkSheetView(){

    	$data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['classes'] = StudentClass::all();
    	$data['exam_types'] = ExamType::all();

    	return view('backend.report.marksheet.marksheet_view',$data);

    }


    public function MarkSheetGet(Request $request)
    {
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$exam_type_id = $request->exam_type_id;
    	$id_number = $request->id_number;

        $count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_number',$id_number)->where('marks','<','33')->get()->count();
            // dd($count_fail);
        $single_student = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_number',$id_number)->first();

        if ($single_student == true) {

            $all_marks = StudentMarks::with(['assign_subject','year'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_number',$id_number)->get();
                // dd($all_marks->toArray());
            $all_grades = MarksGrade::all();
            return view('backend.report.marksheet.marksheet_pdf',compact('all_marks','all_grades','count_fail'));

        }else{

            $notification = array(
                'message' => 'Sorry! These Criteria does not match.',
                'alert-type' => 'error'
            );

    	    return redirect()->back()->with($notification);
       }


    } // end Method
}
