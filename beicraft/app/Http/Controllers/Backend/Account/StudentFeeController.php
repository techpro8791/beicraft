<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountStudentFee;
use App\Models\AssignStudent;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    public function StudentFeeView(){

    	$data['all_data'] = AccountStudentFee::all();
    	return view('backend.account.student_fee.student_fee_view',$data);
    }


    public function StudentFeeAdd(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['fee_categories'] = FeeCategory::all();
    	return view('backend.account.student_fee.student_fee_add', $data);

    }


  public function StudentFeeGetStudent(Request $request){

   	$year_id = $request->year_id;
   	$class_id = $request->class_id;
   	$fee_category_id = $request->fee_category_id;
   	$date = date('Y-m',strtotime($request->date));

    $data = AssignStudent::with(['discount'])->where('year_id',$year_id)->where('class_id',$class_id)->get();

    	 $html['thsource']  = '<th>ID No</th>';
    	 $html['thsource'] .= '<th>Student Name</th>';
    	 $html['thsource'] .= '<th>Father Name</th>';
    	 $html['thsource'] .= '<th>Original Fee</th>';
      	 $html['thsource'] .= '<th>Discount</th>';
      	 $html['thsource'] .= '<th>Discounted Fee</th>';
      	 $html['thsource'] .= '<th>Select</th>';

    	 foreach ($data as $key => $std) {
            $registration_fee = FeeAmount::where('fee_category_id',$fee_category_id)->where('class_id',$std->class_id)->first();

            $account_student_fees = AccountStudentFee::where('student_id',$std->student_id)->where('year_id',$std->year_id)->where('class_id',$std->class_id)->where('fee_category_id',$fee_category_id)->where('date',$date)->first();

            if($account_student_fees !=null) {
                $checked = 'checked';
            }else{
                $checked = '';
            }
                $color = 'success';
                $html[$key]['tdsource']  = '<td>'.$std['student']['id_number']. '<input type="hidden" name="fee_category_id" value= " '.$fee_category_id.' " >'.'</td>';

                $html[$key]['tdsource']  .= '<td>'.$std['student']['name']. '<input type="hidden" name="year_id" value= " '.$std->year_id.' " >'.'</td>';

                $html[$key]['tdsource']  .= '<td>'.$std['student']['father_name']. '<input type="hidden" name="class_id" value= " '.$std->class_id.' " >'.'</td>';

                $html[$key]['tdsource']  .= '<td>'.'₦ '.number_format($registration_fee->amount,2).'<input type="hidden" name="date" value= " '.$date.' " >'.'</td>';

                $html[$key]['tdsource'] .= '<td>'.$std['discount']['discount'].'%'.'</td>';

                $orginal_fee = $registration_fee->amount;
                $discount = $std['discount']['discount'];
                $discountable_fee = $discount/100 * $orginal_fee;
                $finalfee = (int)$orginal_fee-(int)$discountable_fee;

                $html[$key]['tdsource'] .='<td>'. '<input type="text" name="amount[]" value="'.'₦ '.number_format($finalfee).' " class="form-control" readonly'.'</td>';

                $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>';

                    }
                    return response()->json(@$html);

            } // end mehtod




    public function StudentFeeStore(Request $request){

        $date = date('Y-m',strtotime($request->date));

        AccountStudentFee::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('fee_category_id',$request->fee_category_id)->where('date',$request->date)->delete();

        $check_data = $request->checkmanage;

        if ($check_data !=null) {
            for ($i=0; $i <count($check_data) ; $i++) {
                $data = new AccountStudentFee();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->date = $date;
                $data->fee_category_id = $request->fee_category_id;
                $data->student_id = $request->student_id[$check_data[$i]];
                $data->amount = filter_var($request->amount[$check_data[$i]], FILTER_SANITIZE_NUMBER_INT);
                $data->save();
            } // end for loop
        } // end if

        if (!empty(@$data) || empty($check_data)) {

        $notification = array(
            'message' => 'Well Done Data Successfully Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('student.fee.view')->with($notification);
        }else{

            $notification = array(
            'message' => 'Sorry Data not Saved',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

        }

    } // end method
}
