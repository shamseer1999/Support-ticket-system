@extends('mngr.layouts.template')
@section('content')
<div class="card mt-1">
    <div class="card-header">
      Add Role
    </div>
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                  <label for="formGroupExampleInput">Role Name</label>
                  <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Enter Role Name" required>
                </div>
                <div class="form-group mt-1">
                  <input type="submit" class="btn btn-primary" id="formGroupExampleInput2" value="Add Role">
                </div>
              </form>
        </div>
      </div>
  </div>
@endsection