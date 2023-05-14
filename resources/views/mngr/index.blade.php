@extends('mngr.layouts.template')
@section('content')
<style>
    .card-header:hover{
        background-color:lightgrey;
        cursor: pointer;
    }
</style>
    <div class="row pt-3">
        @if (auth()->user()->role ==3)
        
            <div class="col-md-3">
                <div class="card">
                    
                    <div class="card-body bg-warning">
                    <h5 class="card-title text-center">{{$users}}</h5>
                    <h4 class="card-text text-center">Users</h4>
                    </div>
                    <a href="{{route('users')}}" class="text-decoration-none text-dark">
                        <div class="card-header">
                            View Users <label style="float:right;color:tomato"><b>&rarr;</b></label>
                        </div>
                    </a>
                </div>
            </div>
        @endif
        @if (auth()->user()->role ==3)
            <div class="col-md-3">
                <div class="card">
                    
                    <div class="card-body bg-info">
                    <h5 class="card-title text-center">{{$roles}}</h5>
                    <h4 class="card-text text-center">Roles</h4>
                    </div>
                    <a href="{{route('roles')}}" class="text-decoration-none text-dark">
                        <div class="card-header">
                            View Roles <label style="float:right;color:tomato"><b>&rarr;</b></label>
                        </div>
                    </a>
                </div>
            </div>
        @endif
        
        @if (in_array(auth()->user()->role,[1,3]))
            <div class="col-md-3">
                <div class="card">
                    
                    <div class="card-body bg-success">
                    <h5 class="card-title text-center">{{$tickets}}</h5>
                    <h4 class="card-text text-center">Tckets</h4>
                    </div>
                    <a href="{{route('tickets')}}" class="text-decoration-none text-dark">
                        <div class="card-header">
                            View Tickets <label style="float:right;color:tomato"><b>&rarr;</b></label>
                        </div>
                    </a>
                </div>
            </div>
        @endif
        
    </div>
@endsection