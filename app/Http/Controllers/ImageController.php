<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function update(Request $request)
    {
        if($file = $request->file('image'))
        {
            $file_name = uniqid().$file->getClientOriginalName();
            $file->move('images/profile-images/', $file_name);
            //finding the authenticated user
            $user = User::findOrFail(auth()->user()->id);
            $user->img = $file_name;
            $user->save();
            return redirect('/')->with('success', 'Image Successfully Updated');;
        }
    }
}
