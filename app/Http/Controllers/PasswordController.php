<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Show password change screen
     */
    public function edit()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('common.edit-password', compact('user'));
    }

    public function update(Request $request)
    {        
        if (Hash::check($request->cpswd, auth()->user()->password))
        {
            $rules = [
                'npswd' => ['required','min:8']
            ];
            $customMessage = [
                'npswd.required' => 'New Password is Required',
                'npswd.min' => 'New Password should be minimum 8 characters long',
            ];
            $this->validate($request, $rules, $customMessage);
            // echo "Correct PASSWORD";
            if($request->npswd == $request->ncpswd)
            {
                $user = User::findOrFail(auth()->user()->id);
                $user->password = bcrypt($request->npswd);
                $user->save();                
                return redirect('/student')->with('success', 'Password Successfully Updated');                
            }else{
                return redirect('/edit-password')->with('error', 'New Password And Confirm Password dont match');
            }

        }else{
            return redirect('/edit-password')->with('error', 'Incorrect Current Password');
        }
        
        // $user = User::findOrFail(auth()->user()->id);
        // return view('common.edit-password', compact('user'));
    }
}
