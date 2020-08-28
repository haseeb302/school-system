<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\Teacher;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class TeacherController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function profile()
    {
        $teacher = Teacher::where('user_id','=',auth()->user()->id)->first();        
        // echo $teacher->students()->count().' '.  ;
        return view('teacher.profile', compact('teacher'));
    }

    public function index()
    {
        $teachers = Teacher::join('users', 'users.id', '=','teachers.user_id')
        ->join('schools', 'schools.id', '=','users.school_id')
        ->where([
            ['role_id',3],
            ['school_id', auth()->user()->school_id]
        ])->get(['teachers.*', 'users.email','schools.name','schools.contact','schools.address']);

        return view('admin.teacher.index', compact('teachers'));
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.edit', compact('teacher'));        
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $teacher = Teacher::findOrFail($id);
        $teacher->update($input);
        return redirect('/admin/teacher')->with('success', 'Teacher Successfully Updated');                ;
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt('12345678');
        $user->role_id = 3;
        $user->school_id = auth()->user()->school->id;
        $user->save();

        $teacher = new Teacher();
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->course = $request->course;
        $teacher->date_of_entry = $request->date_of_entry;
        $teacher->phone_number = $request->phone_number;        
        $teacher->user_id = $user->id;
        $teacher->save();

        Mail::to($user->email)->send(new WelcomeMail($user,auth()->user()->email));

        return redirect('/admin/teacher')->with('success', 'Teacher Successfully Created');                ;
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);        
        $user = User::findOrFail($teacher->user_id);
        $teacher->students()->detach();
        $user->delete();
        $teacher->delete();

        return redirect('/admin/teacher')->with('success', 'Teacher Successfully Deleted');                ;
    }
}
