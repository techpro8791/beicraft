<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class IDCardController extends Controller
{
    public function IdcardView(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	return view('backend.report.idcard.idcard_view',$data);
    }


    public function IdcardGet(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;

    	$check_data = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->first();

        if ($check_data == true) {

            $data['all_data'] = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
            // dd($data['all_data']->toArray());

            $pdf = Pdf::loadView('backend.report.idcard.idcard_pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');

        }else{

            $notification = array(
                'message' => 'Sorry These Criteria Does not match',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

        }


    }// end method

}
