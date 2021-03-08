<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    # Conosector
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function UserView()
    {
        // $all_data = User::all();
        $data['all_data'] = User::all();
        return view('backend.user.view_user', $data);
    }

    public function UserAdd()
    {
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $validate_data = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
            'usertype'=> 'required',
            'password'=>'required',
        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('user.view')->with($notification);
    }

    public function UserEdit($id)
    {
        $edit_data = User::find($id);
        return view('backend.user.edit_user', compact('edit_data'));
    }

    public function UserUpdate(Request $request, $id)
    {
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id)
    {
        $delete_data = User::find($id);
        $delete_data->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('user.view')->with($notification);
    }
}
