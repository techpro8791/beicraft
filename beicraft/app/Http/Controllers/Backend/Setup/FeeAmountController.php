<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\StudentClass;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{

    public function ViewFeeAmount()
    {
        // $data['all_data'] = FeeAmount::all();
        $data['all_data'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }

    public function FeeAmountAdd()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['student_classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    public function FeeAmountStore(Request $request)
    {
        $count_class = count($request->class_id);

        if ($count_class != NULL) {
            for ($i=0; $i < $count_class; $i++) {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }

        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('fee.amount.view')->with($notification);
    }

    public function FeeAmountEdit($fee_category_id)
    {
        $data['edit_data'] = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        // dd($data['edit_data']->toArray());
        $data['fee_categories'] = FeeCategory::all();
        $data['student_classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount', $data);
    }

    public function FeeAmountUpdate(Request $request, $fee_category_id)
    {
        if ($request->class_id == NULL) {
            $notification = array(
                'message' => 'Ooops! Items to update are required.',
                'alert-type' => 'error'
            );

            return Redirect()->route('fee.amount.edit', $fee_category_id)->with($notification);
        }else {
            $count_class = count($request->class_id);

            # delete previous data before updating
            FeeAmount::where('fee_category_id', $fee_category_id)->delete();
            # update data
            for ($i=0; $i < $count_class; $i++) {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }

        $notification = array(
            'message' => 'Data Updated Successfully.',
            'alert-type' => 'success'
        );

        return Redirect()->route('fee.amount.view', $fee_category_id)->with($notification);
    }

    public function FeeAmountDetails($fee_category_id)
    {
        $data['details_data'] = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();

        return view('backend.setup.fee_amount.details_fee_amount', $data);
    }
}
