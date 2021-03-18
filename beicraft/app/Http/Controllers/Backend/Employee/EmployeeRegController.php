<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class EmployeeRegController extends Controller
{
    public function EmployeeRegView()
    {
        $data['all_data'] = User::where('usertype', 'Employee')->get();

        return view('backend.employee.employee_reg.employee_view', $data);
    }

    public function EmployeeRegAdd()
    {
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_reg.employee_add', $data);
    }

    public function EmployeeRegStore(Request $request)
    {
        DB::transaction(function() use($request){
            $check_year = date('Ym', strtotime($request->join_date));
            //dd($check_year);
            $employee = User::where('usertype','employee')->orderBy('id','DESC')->first();

                if ($employee == null) {
                    $first_reg = 0;
                    $employee_id = $first_reg+1;
                    if ($employee_id < 10) {
                        $id_number = '000'.$employee_id;
                    }elseif ($employee_id < 100) {
                        $id_number = '00'.$employee_id;
                    }elseif ($employee_id < 1000) {
                        $id_number = '0'.$employee_id;
                    }
                }else{
                    $employee = User::where('usertype','employee')->orderBy('id','DESC')->first()->id;
                    $employee_id = $employee+1;
                    if ($employee_id < 10)
                    {
                        $id_number = '000'.$employee_id;
                    }elseif ($employee_id < 100)
                    {
                        $id_number = '00'.$employee_id;
                    }elseif ($employee_id < 1000) {
                        $id_number = '0'.$employee_id;
                    }

                } // end else

                $final_id_number = $check_year.$id_number;
                $user = new User();
                $code = rand(0000,9999);
                $user->id_number = $final_id_number;
                $user->password = bcrypt($code);
                $user->usertype = 'employee';
                $user->code = $code;
                $user->name = $request->name;
                $user->father_name = $request->father_name;
                $user->mother_name = $request->mother_name;
                $user->mobile = $request->mobile;
                $user->address = $request->address;
                $user->gender = $request->gender;
                $user->religion = $request->religion;
                $user->salary = $request->salary;
                $user->designation_id = $request->designation_id;
                $user->dob = date('Y-m-d',strtotime($request->dob));
                $user->join_date = date('Y-m-d',strtotime($request->join_date));

                if ($request->file('image'))
                {
                    $file = $request->file('image');
                    $file_name = date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/employee_images'), $file_name);
                    $user['image'] = $file_name;
                }
                $user->save();

                $employee_salary = new EmployeeSalaryLog();
                $employee_salary->employee_id = $user->id;
                $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
                $employee_salary->previous_salary = $request->salary;
                $employee_salary->present_salary = $request->salary;
                $employee_salary->increament_salary = '0';
                $employee_salary->save();

            });


            $notification = array(
                'message' => 'Employee Registration Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('employee.registration.view')->with($notification);

    }

    public function EmployeeRegEdit($id)
    {
        $data['edit_data'] = User::find($id);
        $data['designation'] = Designation::all();

        return view('backend.employee.employee_reg.employee_edit', $data);
    }

    public function EmployeeRegUpdate(Request $request, $id){

    	$user = User::find($id);
    	$user->name = $request->name;
    	$user->father_name = $request->father_name;
    	$user->mother_name = $request->mother_name;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;

    	$user->designation_id = $request->designation_id;
    	$user->dob = date('Y-m-d',strtotime($request->dob));


    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/employee_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/employee_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();

    	$notification = array(
    		'message' => 'Employee Registration Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.registration.view')->with($notification);
    }// END METHOD



    public function EmployeeRegDetails($id){
    	$data['details'] = User::find($id);

        $pdf = Pdf::loadView('backend.employee.employee_reg.employee_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }

}
