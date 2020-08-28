@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="offset-2 col-sm-8 col-md-8">

            <div class="card mt-5">
                <div class="card-body">
                <h2 class="card-title">{{$user->name}}, you can Change Password</h2>
                    <hr>                    
                    <form method="POST" action="{{ route('update-password') }}">
                        {{ method_field('patch') }}
                        <div class="row">                        
                            <div class="col">
                                <label for="cpswd">Current Password: </label>
                                <input type="password" class="form-control" name="cpswd">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="npswd">New Password: </label>
                                <input type="password" class="form-control" name="npswd">
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col">
                                <label for="ncpswd">Confirm Password: </label>
                                <input type="password" class="form-control" name="ncpswd">
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