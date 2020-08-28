<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Session;
use App\School;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class SchoolController extends Controller
{

    public function __construct()
    {
        return $this->middleware(['auth', 'super-admin']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::latest()->get();
        return view('super-admin.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = new School();
        $school->name = $request->school_name;
        $school->address = $request->address;
        $school->contact = $request->contact;

        $admin = new User();
        $admin->name = $request->admin_name;
        $admin->email = $request->admin_email;
        $admin->password = bcrypt('12345678'); //first time password
        $admin->role_id = 2; // for admin
        $admin->school_id = 0; // default
        $admin->save();
        
        $school->admin_id = $admin->id;
        $school->save();

        $admin->school_id = $school->id; // correct school id
        $admin->save();
        
        Mail::to($admin->email)->send(new WelcomeMail($admin,auth()->user()->email));

        // Session::flash('school_success',);
        return redirect('/super-admin')->with('success', 'School Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::findOrFail($id);
        return view('super-admin.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $school = School::findOrFail($id);
        $input = $request->all();
        $school->update($input);

        return redirect('/super-admin')->with('success', 'School Successfully Edited');;        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);        
        $school->delete();
        $school->admin->delete();
        return redirect('/super-admin')->with('success', 'School Successfully Deleted');;        
    }
}
