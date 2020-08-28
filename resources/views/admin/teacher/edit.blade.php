@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="offset-2 col-sm-8 col-md-8">

            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title">Edit Teacher</h2>
                    <hr>                    
                    <form method="POST" action="{{ route('admin.teacher.update', $teacher->id) }}">
                        {{method_field('patch')}}
                        <div class="row">                        
                            <div class="col">
                                <label for="fname">First Name: </label>
                            <input type="text" class="form-control" placeholder="First name" name="first_name" value="{{$teacher->first_name}}">
                            </div>
                            <div class="col">
                                <label for="lname">Last Name: </label>
                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{$teacher->last_name}}">
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col">
                                <label for="dob">Date of Entry: </label>
                                <input type="date" class="form-control" name="date_of_entry" value="{{$teacher->date_of_entry}}">
                            </div>
                            <div class="col">
                                <label for="phone_number">Phone Number: </label>
                                <input type="number" class="form-control" placeholder="Phone Number" name="phone_number" value="{{$teacher->phone_number}}">
                            </div>
                        </div>
                        <label for="course">Assign Course: </label>
                        <select class="custom-select" name="course" value="{{$teacher->course}}">
                            <option selected>Open this select menu</option>
                            <option value="itc">ITC</option>
                            <option value="pf">PF</option>
                            <option value="oop">OOP</option>
                        </select>
                        <button type="submit" class="btn btn-success mt-3 float-right">Update</button>                    
                        {{csrf_field()}}
                    </form>
                </div>
            </div>            
        </div>
    </div>
@endsection