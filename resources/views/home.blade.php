@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>        
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            
            @if(auth()->user()->role->id == 1)            
                <a class="card clickable-cards" href="{{ route('super-admin.index')}} ">            
                    <div class="card-header">
                        <h4 class="card-title">VIEW SCHOOLS</h4> 
                    </div>                
                </a>
            @endif

            @if(auth()->user()->role->id == 2)
                <a class="card clickable-cards mt-3" href="{{ route('admin.student.index') }}">            
                    <div class="card-header">
                        <h4 class="card-title">VIEW STUDENTS</h4> 
                    </div>                
                </a>

                <a class="card clickable-cards mt-3" href="{{ route('admin.teacher.index') }}">            
                    <div class="card-header">
                        <h4 class="card-title">VIEW TEACHERS</h4> 
                    </div>                
                </a>
            @endif

            @if(auth()->user()->role->id == 3 || auth()->user()->role->id == 4)
                <a class="card clickable-cards mt-3" 
                    href="{{ (auth()->user()->role->id == 3)? route('teacher.profile') : route('student.profile') }}">            
                    <div class="card-header">
                        <h4 class="card-title">Profile</h4> 
                    </div>                
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
