<?php

namespace App\Http\Controllers\Creator\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Creator;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:creator');
    }

    public function changePasswordForm()
    {
        $id         = Auth::guard('administrator')->id();
        $user       = Creator::find($id);
        return view('creator.settings.change-password', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $id         = Auth::guard('creator')->id();

        $this->validate($request, [
            'current_password'      => 'required',
            'new_password'          => 'required|min:8|confirmed',

        ]);

        $user                       = Creator::find($id);

        if (Hash::check($request->get('current_password'), $user->password)) {

            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('creator.password.form')->with('success', 'Password changed successfully!');

        } else {

            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        return redirect()->route('creator.password.form')->with('success', 'Password changed successfully');
    }

}
