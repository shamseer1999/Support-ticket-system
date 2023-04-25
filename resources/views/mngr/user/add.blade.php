@extends('mngr.layouts.template')
@section('content')
<div class="card mt-1">
    <div class="card-header">
      Add User
    </div>
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                  <label for="formGroupExampleInput"> Name</label>
                  <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Enter Your Name" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"> Email</label>
                  <input type="email" class="form-control" name="email" id="formGroupExampleInput" placeholder="Enter Your Email" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"> Role</label>
                  <select name="role" id="" class="form-control" required>
                    <option value=""> --SELECT-- </option>
                    @if (!empty($roles))
                        @foreach ($roles as $item)
                            <option value="{{$item->id}}">{{$item->role_name}}</option>
                        @endforeach
                    @endif
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group mt-1">
                  <input type="submit" class="btn btn-primary" id="formGroupExampleInput2" value="Add User">
                </div>
              </form>
        </div>
      </div>
  </div>
@endsection