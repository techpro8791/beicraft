<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function EmployeeAttendanceView(){
       $data['all_data'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
    	//  $data['all_data'] = EmployeeAttendance::orderBy('id','DESC')->get();
    	return view('backend.employee.employee_attendance.employee_attendance_view', $data);
    }


    public function EmployeeAttendanceAdd(){
    	$data['employees'] = User::where('usertype','employee')->get();
    	return view('backend.employee.employee_attendance.employee_attendance_add',$data);

    }


    public function EmployeeAttendanceStore(Request $request){

    	EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
    	$count_employee = count($request->employee_id);
    	for ($i=0; $i < $count_employee ; $i++)
        {
    		$attend_status = 'attend_status'.$i;
    		$attend = new EmployeeAttendance();
    		$attend->date = date('Y-m-d',strtotime($request->date));
    		$attend->employee_id = $request->employee_id[$i];
    		$attend->attend_status = $request->$attend_status;
    		$attend->save();
    	} // end For Loop

 		$notification = array(
    		'message' => 'Employee Attendace Data Update Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.attendance.view')->with($notification);

    } // end Method



    public function EmployeeAttendanceEdit($date){
    	$data['edit_data'] = EmployeeAttendance::where('date',$date)->get();
    	$data['employees'] = User::where('usertype','employee')->get();
    	return view('backend.employee.employee_attendance.employee_attendance_edit',$data);
    }


    public function EmployeeAttendanceDetails($date){
    	$data['details'] = EmployeeAttendance::where('date', $date)->get();
    	return view('backend.employee.employee_attendance.employee_attendance_details', $data);

    }
}
