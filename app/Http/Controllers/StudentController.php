<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class StudentController extends Controller
{
    public function profile()
    {
        $student = Student::where('user_id','=',auth()->user()->id)->first();        

        return view('student.profile',compact('student'));
    }

    public function index()
    {
        $teachers = Teacher::join('users', 'users.id', '=','teachers.user_id')
        ->join('schools', 'schools.id', '=','users.school_id')
        ->where([
            ['role_id',3],
            ['school_id', auth()->user()->school_id]
        ])->get(['users.name','teachers.id']);

        $students = Student::join('users', 'users.id', '=','students.user_id')
        ->join('schools', 'schools.id', '=','users.school_id')
        ->where([
            ['role_id',4],
            ['school_id', auth()->user()->school_id]
        ])->get(['students.*', 'users.email','schools.name','schools.contact','schools.address']);
            
        return view('admin.student.index', compact('teachers','students'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $teachers = Teacher::join('users', 'users.id', '=','teachers.user_id')
        ->join('schools', 'schools.id', '=','users.school_id')
        ->where([
            ['role_id',3],
            ['school_id', auth()->user()->school_id]
        ])->get(['users.name','teachers.id']);
        return view('admin.student.edit', compact('student','teachers'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $student = Student::findOrFail($id);
        $student->update($input);
        if($request->teachers_id)
        {
            $student->teacher()->sync($request->teachers_id);
        }        
        return redirect('/admin/student')->with('success', 'Student Successfully Updated');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt('12345678');
        $user->role_id = 4;
        $user->school_id = auth()->user()->school->id;
        $user->save();

        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->father_name = $request->father_name;
        $student->date_of_birth = $request->date_of_birth;               
        $student->user_id = $user->id;        
        $student->save();

        $student->teacher()->sync($request->teachers_id);
        Mail::to($user->email)->send(new WelcomeMail($user,auth()->user()->email));
        
        return redirect('/admin/student')->with('success', 'Student Successfully Created');  
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $user = User::findOrFail($student->user_id);
        $student->teacher()->detach();
        $user->delete();
        $student->delete();        
        return redirect('/admin/student')->with('success', 'Student Successfully Deleted');
    }
}
