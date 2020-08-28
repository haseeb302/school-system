@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="offset-2 col-sm-8 col-md-8">

            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title">Edit School</h2>
                    <hr>                    
                    <form method="POST" action="{{ route('super-admin.update', $school->id) }}">
                        {{ method_field('patch') }}
                        <div class="row">                        
                            <div class="col">
                                <label for="school_name">School Name: </label>
                                <input type="text" class="form-control" placeholder="" name="name" value="{{ $school->name }}">
                            </div>
                            <div class="col">
                                <label for="contact">Contact </label>
                                <input type="number" class="form-control" name="contact" value="{{ $school->contact }}">
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col">
                                <label for="address">Address: </label>
                                <input type="text" class="form-control" name="address" value="{{ $school->address }}">
                            </div>
                            <div class="col">
                                <label for="email">Admin Email: </label>
                                <input type="email" class="form-control" value="{{ $school->admin->email }}" disabled>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3 float-right">Update</button>                    
                        <a class="btn btn-info mt-3 float-right" href="{{ route('super-admin.editAdmin', $school->id) }}">Change Admin</a>                    
                        {{csrf_field()}}
                    </form>
                </div>
            </div>            
        </div>
    </div>
@endsection