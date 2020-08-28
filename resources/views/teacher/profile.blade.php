@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="card my-card">
                <div class="card-body">
                    <div class=" card-header">
                    <img class="img-fluid profile-image" src="/images/profile-images/{{ $teacher->user->img ? $teacher->user->img : 'default.jpg'}}">
                        <!-- card-img-top -->
                    </div>
                    <form method="POST" action="{{ route('update-image') }}" enctype="multipart/form-data" class="form-group">                                            
                        {{ method_field('patch') }}
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-success btn-file">
                                    Upload Image <input type="file" name="image">
                                </span>
                            </span>
                        </div>
                        <button class="btn btn-secondary" type="submit">Submit</button>    
                        {{ csrf_field() }}     
                    </form>
                    <div class="">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>{{ $teacher->first_name.' '.$teacher->last_name }}</strong></li>
                            <li class="list-group-item"><strong>{{ $teacher->user->school->name }} </strong></li>
                            <li class="list-group-item"><strong>{{ $teacher->phone_number }} </strong></li>
                            <li class="list-group-item"><strong>{{ $teacher->user->email }}</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="card my-card">
                <div class="card-body">                                        
                    <a class="btn btn-success" href="{{ route('edit-password') }}">Change Password</a>
                    <hr>
                    <h3 class="m-3">Created Courses</h3>
                    <div class="row courses-row">                        
                        <div class="card courses-card col-sm-6 col-md-4">
                            <div class="card-body">
                                <h4 class="card-title">Course Name</h4>
                                <h5 class="card-subtitle mb-2 text-muted">Total Students</h5>
                            </div>
                        </div>  
                        <div class="card courses-card col-sm-6 col-md-4">
                            <div class="card-body">
                                <h4 class="card-title">Course Name</h4>
                                <h5 class="card-subtitle mb-2 text-muted">Total Students</h5>
                            </div>
                        </div>
                        <div class="card courses-card col-sm-6 col-md-4">
                            <div class="card-body">
                                <h4 class="card-title">Course Name</h4>
                                <h5 class="card-subtitle mb-2 text-muted">Total Students</h5>
                            </div>
                        </div>                          
                    </div> 
                    <hr>
                    <h3 class="m-3">Students Assigned</h3>
                    <div class="assigned-students-row">
                        @foreach ($teacher->students as $myStudents)
                            <div class="student-block text-center">
                                <img class="student-img" />
                                <p>{{ $myStudents->first_name }}</p>                            
                            </div>                        
                        @endforeach                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection