<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use DB;
use PDF;

class StudentRollController extends Controller
{
    public function StudentRollView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.student.roll_generate.roll_generate_view', $data);

    }

    public function GetStudents(Request $request)
    {
        // dd('ok done');
        $all_data = AssignStudent::with(['student'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        // dd($all_data->toArray());
        return response()->json($all_data);
    }

    public function StudentRollStore(Request $request)
    {
        $year_id = $request->year_id;
    	$class_id = $request->class_id;

    	if ($request->student_id !=null) {

            for ($i=0; $i < count($request->student_id); $i++) {
    			AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll' => $request->roll[$i]]);
    		} // end for loop

    	}else{

    		$notification = array(
                'message' => 'Sorry there are no student',
                'alert-type' => 'error'
    	    );

    	   return redirect()->back()->with($notification);
    	} // End IF Condition

       $notification = array(
    		'message' => 'Welldone Roll Generated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('roll.generate.view')->with($notification);

    }
}
