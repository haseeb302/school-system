@extends('layouts.app')

@section('content')
    
    <div class="row mt-5">
        <div class="col-sm-12 col-md-12">
            <button class="btn btn-lg btn-bg float-right m-2" data-toggle="modal" data-target="#createSchoolModal">
                ADD SCHOOL
            </button>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-bg">
                        <tr>
                            <th>#</th>
                            <th>School Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>School Admin ID</th>
                            <th>Edit/Delete</th>                        
                        </tr>                    
                    </thead>
                    <tbody class="tbody-bg">
                        @foreach($schools as $school)
                        <tr>
                            <td>{{ $school->id }}</td>
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->contact }}</td>
                            <td>{{ $school->address }}</td>
                            <td>{{ $school->admin->email }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success m-1" href="{{ route('super-admin.edit', $school->id) }}">Edit</a>
                                    <form method="POST" action="{{ route('super-admin.destroy', $school->id) }}">
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger m-1">Delete</button>
                                        {{csrf_field()}}
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


    <!-- {{-- modal to add school --}}     -->
    <div class="modal fade" id="createSchoolModal" tabindex="-1" role="dialog" aria-labelledby="createSchoolModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="createSchoolModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-body">
                <form method="POST" action="{{ route('super-admin.store') }}">
                    <h2>School Details</h2>
                    <hr>
                    <div class="row">                        
                        <div class="col">
                            <label for="sname">School Name: </label>
                            <input type="text" class="form-control" name="school_name">
                        </div>
                        <div class="col">
                            <label for="contact">Contact </label>
                            <input type="number" class="form-control" name="contact">
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col">
                            <label for="address">Address: </label>
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>    
                    <hr>                    
                    <h2>Admin Details</h2>               
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="name">Name: </label>
                            <input type="text" class="form-control" name="admin_name">
                        </div>
                        <div class="col">
                            <label for="email">Email: </label>
                            <input type="email" class="form-control" name="admin_email">
                        </div>                        
                    </div>
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