<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class AccountSalaryController extends Controller
{
    public function AccountSalaryView(){

    	$data['all_data'] = AccountEmployeeSalary::all();
    	return view('backend.account.employee_salary.employee_salary_view', $data);

    }


    public function AccountSalaryAdd(){

      return view('backend.account.employee_salary.employee_salary_add');
    }


    public function AccountSalaryGetEmployee(Request $request){

        $date = date('Y-m',strtotime($request->date));
        if ($date !='') {
        $where[] = ['date','like',$date.'%'];
        }

        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID NO</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Actual Salary</th>';
        $html['thsource'] .= '<th>Select</th>';


        foreach ($data as $key => $attend)
        {

            $account_salary = AccountEmployeeSalary::where('employee_id',$attend->employee_id)->where('date',$date)->first();

            if($account_salary !=null)
            {
                $checked = 'checked';
            }else
            {
                $checked = '';
            }

            $total_attend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
            $absent_count = count($total_attend->where('attend_status','Absent'));

            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['id_number'].'<input type="hidden" name="date" value="'.$date.'" >'.'</td>';

            $html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.'₦ '.number_format($attend['user']['salary'], 2).'</td>';

            $salary = (float)$attend['user']['salary'];
            $salary_per_day = (float)$salary/30;
            $amount_deducted = (float)$absent_count * (float)$salary_per_day;
            $total_salary = (float)$salary - (float)$amount_deducted;

            $html[$key]['tdsource'] .='<td>'.'₦ '.number_format($total_salary, 2).'<input type="hidden" name="amount[]" value="'.$total_salary.'" >'.'</td>';


            $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" value="'.$attend->employee_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>';

        }  // end foreach
        return response()->json(@$html);

    } // end Method



    public function AccountSalaryStore(Request $request){

    	$date = date('Y-m', strtotime($request->date));

    	AccountEmployeeSalary::where('date',$date)->delete();

    	$check_data = $request->checkmanage;

    	if ($check_data !=null) {
    		for ($i=0; $i < count($check_data) ; $i++) {
    			$data = new AccountEmployeeSalary();
    			$data->date = $date;
    			$data->employee_id = $request->employee_id[$check_data[$i]];
    			$data->amount = filter_var(number_format($request->amount[$check_data[$i]],0),FILTER_SANITIZE_NUMBER_INT);
    			$data->save();
    		}
    	} // end if

    	if (!empty(@$data) || empty($check_data)) {

            $notification = array(
                'message' => 'Well Done Data Successfully Updated',
                'alert-type' => 'success'
            );

    	    return redirect()->route('account.salary.view')->with($notification);
    	}else{

    		$notification = array(
                'message' => 'Sorry Data not Saved',
                'alert-type' => 'error'
    	    );

    	    return redirect()->back()->with($notification);

    	}

    } // end method
}
