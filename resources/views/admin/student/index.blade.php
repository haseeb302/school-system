@extends('layouts.app')

@section('content')
        
    <div class="row mt-5">
        <div class="col-sm-12 col-md-12">
            <button class="btn btn-lg btn-bg float-right m-2" data-toggle="modal" data-target="#createStudentModal">
                ADD Student
            </button>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-bg">
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>School Name</th>
                            <th>Father Name</th>                        
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Email</th> 
                            <th>Assigned to</th>                        
                            <th>Edit/Delete</th>                        
                        </tr>                    
                    </thead>
                    <tbody class="tbody-bg">
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->father_name }}</td>
                                <td>{{ $student->contact }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    @foreach ($student->teacher as $t)
                                        {{ $t->first_name.' '.$t->last_name }},
                                    @endforeach                                    
                                </td>
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-success m-1" href="{{ route('admin.student.edit', $student->id) }}">Edit</a>
                                        <form method="POST" action="{{ route('admin.student.destroy', $student->id) }}">
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


    <!-- {{-- modal to add student --}}     -->
    <div class="modal fade" id="createStudentModal" tabindex="-1" role="dialog" aria-labelledby="createStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createStudentModalLabel">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.student.store') }}">
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
                            <label for="dob">Date of Birth: </label>
                            <input type="date" class="form-control" name="date_of_birth">
                        </div>
                        <div class="col">
                            <label for="father_name">Father Name: </label>
                            <input type="text" class="form-control" placeholder="Father Name" name="father_name">
                        </div>
                    </div>
                    <div class="row">                                                
                        <div class="col">
                            <label for="email">Email ID: </label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="col">
                            <label for="lname">Assign To: </label>
                            <select class="selectpicker" name="teachers_id[]" multiple>                    
                                <option selected>Choose Teachers</option>
                                @foreach ($teachers as $teacher)                            
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>                            
                                @endforeach
                            </select>                                        
                        </div>
                    </div>                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </div>
                    {{ csrf_field() }}                                
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection