@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="offset-2 col-sm-8 col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title">Change Admin</h2>
                    <hr>                    
                    <form method="POST" action="{{ route('super-admin.updateAdmin', $school->id) }}">
                        {{method_field('patch')}}
                        <div class="row">                        
                            <div class="col">
                                <label for="sname">School Name: </label>
                                <input type="text" class="form-control" disabled name="" value="{{ $school->name }}">
                            </div>
                            <div class="col">
                                <label for="contact">Contact </label>
                                <input type="number" class="form-control" disabled value="{{ $school->contact }}">
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col">
                                <label for="address">Address: </label>
                                <input type="text" class="form-control" disabled value="{{ $school->address }}">
                            </div>
                        </div>                        
                        <div class="row">                        
                            <div class="col">
                                <label for="address">Admin Name: </label>
                                <input type="text" class="form-control" name="name" value="{{ $school->admin->name }}">
                            </div>
                            <div class="col">
                                <label for="email">Admin Email: </label>
                                <input type="email" class="form-control" name="email" value="{{ $school->admin->email }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3 float-right">Update</button>                                            
                        {{csrf_field()}}
                    </form>
                </div>
            </div>            
        </div>
    </div>
@endsection