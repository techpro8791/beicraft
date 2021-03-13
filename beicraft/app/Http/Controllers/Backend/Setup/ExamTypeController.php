<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    # Conosector
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function ViewExamType()
    {
        $data['all_data'] = ExamType::all();

        return view('backend.setup.exam_type.view_exam_type', $data);
    }

    public function ExamTypeAdd()
    {
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function ExamTypeStore(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamTypeEdit($id)
    {
        $edit_data = ExamType::find($id);

        return view('backend.setup.exam_type.edit_exam_type',compact('edit_data'));
    }

    public function ExamTypeUpdate(Request $request, $id)
    {
        $data = ExamType::find($id);

        $validate_data = $request->validate([
            'name' => 'required|unique:exam_types,name, '.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamTypeDelete($id)
    {
    $delete_data = ExamType::find($id);
    $delete_data->delete();

    $notification = array(
        'message' => 'Exam Type Deleted Successfully',
        'alert-type' => 'info'
    );

    return Redirect()->route('exam.type.view')->with($notification);
    }
}
