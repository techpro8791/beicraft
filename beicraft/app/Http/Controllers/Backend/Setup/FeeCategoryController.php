<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;


class FeeCategoryController extends Controller
{
    # Conosector
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function ViewFeeCategory()
    {
        $data['all_data'] = FeeCategory::all();

        return view('backend.setup.fee_category.view_fee_category', $data);
    }

    public function FeeCategoryAdd()
    {
        return view('backend.setup.fee_category.add_fee_category');
    }

    public function FeeCategoryStore(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('fee.category.view')->with($notification);
    }

    public function FeeCategoryEdit($id)
    {
        $edit_data = FeeCategory::find($id);

        return view('backend.setup.fee_category.edit_fee_category',compact('edit_data'));
    }

    public function FeeCategoryUpdate(Request $request, $id)
    {
        $data = FeeCategory::find($id);

        $validate_data = $request->validate([
            'name' => 'required|unique:fee_categories,name, '.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Fee Category Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('fee.category.view')->with($notification);
    }

    public function FeeCategoryDelete($id)
    {
        $delete_data = FeeCategory::find($id);
        $delete_data->delete();

        $notification = array(
            'message' => 'Student Fee Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('fee.category.view')->with($notification);
    }
}
