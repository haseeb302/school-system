<?php

namespace App\Http\Controllers;

use App\School;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {              

    }

    public function store(Request $request)
    {        
        
    }

    public function edit($id)
    {
        $school = School::findOrFail($id);        
        return view('super-admin.editAdmin', compact('school'));
    }
    
    public function update(Request $request, $id)
    {
        $school = School::findOrFail($id);
        if($school->admin->email === $request->email)
        {
            $input = $request->all();
            $school->admin->update($input);
        }
        else
        {              
            $admin = new User();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = bcrypt('12345678'); //first time password
            $admin->role_id = 2; // for admin
            $admin->school_id = $school->id;
            $admin->save();

            $school->admin_id = $admin->id;        
            $school->save();

            $oldAdmin = User::findOrFail($school->admin->id);
            $oldAdmin->delete();
        }
        return redirect('/super-admin')->with('success', 'Admin Successfully Updated');;        
    }

    public function destroy($id)
    {
        
    }    
}

// $teachers = null;
//         $users = DB::table('users')->where([
//             ['role_id','=', 3],
//             ['school_id', '=', auth()->user()->school_id],
//         ])->get();  

//         for( $i = 0; $i < $users->count; $i++)
//         {
//             $teachers = DB::table('teachers')-> 
//         }
//         // $teachers = User::where(function($query){
//         //     $query->select('*')
//         //     ->from('teachers')
//         //     ->whereColumn('teachers.user_id','users.id');
//         // },[
//         //     ['role_id','=', 3],
//         //     ['school_id', '=', auth()->user()->school_id]
//         // ])->get();
//         // $teachers = User::where([
//         //     ['role_id', '=', 3 ],
//         //     ['school_id', '=', auth()->user()->school_id]            
//         // ])->get();
//         // $teachers_details = Teacher::where();    
//         var_dump($users->count);
//         // return view('admin.teacher.index', compact('teachers'));