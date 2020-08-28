@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="offset-2 col-sm-8 col-md-8">

            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title">Edit Student</h2>
                    <hr>                    
                    <form method="POST" action="{{ route('admin.student.update', $student->id) }}">
                        {{ method_field('patch') }}
                        <div class="row">                        
                            <div class="col">
                                <label for="fname">First Name: </label>
                                <input type="text" class="form-control" placeholder="First name" name="first_name" value="{{ $student->first_name }}">
                            </div>
                            <div class="col">
                                <label for="lname">Last Name: </label>
                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{ $student->last_name }}">
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col">
                                <label for="dob">Date of Birth: </label>
                                <input type="date" class="form-control" name="date_of_birth" value="{{ $student->date_of_birth }}">
                            </div>
                            <div class="col">
                                <label for="father_name">Father Name: </label>
                                <input type="text" class="form-control" placeholder="Father Name" name="father_name" value="{{ $student->father_name }}">
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col">
                                <label for="lname">Assign To: </label>                                
                                <select class="selectpicker form-control" name="teachers_id[]" multiple>
                                    <option selected>Choose Teachers</option>
                                    @foreach ($teachers as $teacher)                            
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>                            
                                    @endforeach
                                </select>         
                            </div>
                        </div>                        
                        <button type="submit" class="btn btn-success mt-3 float-right">Update</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>            
        </div>
    </div>
@endsection