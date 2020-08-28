<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
        // if(auth()->user()->role->id === 1)
        // {
        //     return redirect('/super-admin');    
        // }
        // else if(auth()->user()->role->id === 2)
        // {
        //     return redirect('/admin/student');
        // }
        // else if(auth()->user()->role->id === 3)
        // {
        //     return redirect('/teacher');
        // }
        // else if(auth()->user()->role->id === 4)
        // {
        //     return redirect('/student');
        // }
        // return view('home');
    }
}
