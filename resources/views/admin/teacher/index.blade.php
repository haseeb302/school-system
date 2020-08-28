@extends('layouts.app')

@section('content')
        
    <div class="row mt-5">
        <div class="col-sm-12 col-md-12">
            <button class="btn btn-lg btn-bg float-right m-2" data-toggle="modal" data-target="#createTeacherModal">
                ADD Teacher
            </button>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-bg">
                        <tr>
                            <th>#</th>
                            <th>Teacher Name</th>
                            <th>School Name</th>
                            <th>Contact</th>
                            <th>School Address</th>
                            <th>Email</th>                        
                            <th>Course Assigned</th> 
                            <th>Edit/Delete</th>                        
                        </tr>                    
                    </thead>
                    <tbody class="tbody-bg">
                        @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->first_name }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->phone_number }}</td>
                            <td>{{ $teacher->address }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->course }}</td>
                            <td>
                                <div class="btn-group">
                                <a class="btn btn-success m-1" href="{{ route('admin.teacher.edit', $teacher->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.teacher.destroy', $teacher->id) }}">
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger m-1">Delete</button>
                                        {{ csrf_field() }}
                                </form>                                
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- {{-- modal to add teacher --}}     -->
    <div class="modal fade" id="createTeacherModal" tabindex="-1" role="dialog" aria-labelledby="createTeacherModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTeacherModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.teacher.store') }}">                    
                    <div class="row">                        
                        <div class="col">
                            <label for="fname">First Name: </label>
                            <input type="text" class="form-control" placeholder="First name" name="first_name">
                        </div>
                        <div class="col">
                            <label for="lname">Last Name: </label>
                            <input type="text" class="form-control" placeholder="Last name" name="last_name">
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col">
                            <label for="dob">Date of Entry: </label>
                            <input type="date" class="form-control" name="date_of_entry">
                        </div>
                        <div class="col">
                            <label for="father_name">Phone Number: </label>
                            <input type="number" class="form-control" placeholder="Phone Number" name="phone_number">
                        </div>
                    </div>                    
                    <div class="row">                                                
                        <div class="col">
                            <label for="email">Email ID: </label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <label for="course">Assign Course: </label>
                    <select class="custom-select" name="course">
                        <option selected>Open this select menu</option>
                        <option value="itc">ITC</option>
                        <option value="pf">PF</option>
                        <option value="oop">OOP</option>
                    </select>                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">ADD</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>            
            </div>
        </div>
    </div>
@endsection