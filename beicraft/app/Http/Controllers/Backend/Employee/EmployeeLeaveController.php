<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeeLeaveController extends Controller
{
    public function EmployeeLeaveView(){
    	$data['all_data'] = EmployeeLeave::orderBy('id','desc')->get();
    	return view('backend.employee.employee_leave.employee_leave_view', $data);
    }


    public function EmployeeLeaveAdd(){

    	$data['employees'] = User::where('usertype','employee')->get();
    	$data['leave_purpose'] = LeavePurpose::all();
    	return view('backend.employee.employee_leave.employee_leave_add', $data);
    }


    public function EmployeeLeaveStore(Request $request){

    	if ($request->leave_purpose_id == "0") {
    		$leavepurpose = new LeavePurpose();
    		$leavepurpose->name = $request->name;
    		$leavepurpose->save();
    		$leave_purpose_id = $leavepurpose->id;
    	}else{
    		$leave_purpose_id = $request->leave_purpose_id;
    	}

    	$data = new EmployeeLeave();

        $leave_start = new DateTime(($request->start_date));
    	$leave_end = new DateTime(($request->end_date));
        $diff_in_days = $leave_start->diff($leave_end);
        $elapsed = $diff_in_days->format('%R%a');

        if ($elapsed > 0) {

            $data->employee_id = $request->employee_id;
            $data->leave_purpose_id = $leave_purpose_id;
            $data->start_date = date('Y-m-d',strtotime($request->start_date));
            $data->end_date = date('Y-m-d',strtotime($request->end_date));

            $data->save();

            $notification = array(
                'message' => 'Employee Leave Data Inserted Successfully',
                'alert-type' => 'success'
            );

           return redirect()->route('employee.leave.view')->with($notification);

        } else {

            $notification = array(
                'message' => 'Date Selected Must Be Valid!',
                'alert-type' => 'error'
            );
           return redirect()->back()->with($notification);
        }
    }// end Method



    public function EmployeeLeaveEdit($id){
    	$data['edit_data'] = EmployeeLeave::find($id);
    	$data['employees'] = User::where('usertype','employee')->get();
    	$data['leave_purpose'] = LeavePurpose::all();
    	return view('backend.employee.employee_leave.employee_leave_edit', $data);

    }

    public function EmployeeLeaveUpdate(Request $request, $id){

    	if ($request->leave_purpose_id == "0") {
    		$leavepurpose = new LeavePurpose();
    		$leavepurpose->name = $request->name;
    		$leavepurpose->save();
    		$leave_purpose_id = $leavepurpose->id;
    	}else{
    		$leave_purpose_id = $request->leave_purpose_id;
    	}

    	$data = EmployeeLeave::find($id);
    	$data->employee_id = $request->employee_id;
    	$data->leave_purpose_id = $leave_purpose_id;
    	$data->start_date = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date = date('Y-m-d',strtotime($request->end_date));
    	$data->save();

    	$notification = array(
    		'message' => 'Employee Leave Data Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.leave.view')->with($notification);

    } // end Method



    public function EmployeeLeaveDelete($id){
    	$leave = EmployeeLeave::find($id);
    	$leave->delete();

    	$notification = array(
    		'message' => 'Employee Leave Data Deleted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.leave.view')->with($notification);
    }
}
