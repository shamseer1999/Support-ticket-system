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
                  <label for="formGroupExampleInput"> Title</label>
                  <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Enter Your Title" required>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"> Message</label>
                    <textarea name="message" class="form-control" id="" cols="10" rows="6" required placeholder="Enter your message" required></textarea>
                </div>
                {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </div> --}}
                <div class="form-group">
                  <label for="formGroupExampleInput"> Labels</label><br>
                  @if (!empty($labels))
                      @foreach ($labels as $item)
                          <span class=""><input type="checkbox" name="label[]" class="form-check-input" value="{{$item->id}}"><label class="form-check-label ps-1">{{$item->label_name}}</label></span><br>
                      @endforeach
                  @endif
                </div>
                <div class="form-group">
                    <label for="">Categories</label><br>
                    @if (!empty($categories))
                      @foreach ($categories as $item)
                          <span class=""><input type="checkbox" name="category[]" class="form-check-input" value="{{$item->id}}"><label class="form-check-label ps-1">{{$item->category_name}}</label></span><br>
                      @endforeach
                  @endif
                </div>
                <div class="form-group">
                    <label for="">Priority</label>
                    <select name="priority" class="form-control" id="" required>
                        <option value="1">High</option>
                        <option value="2">Medium</option>
                        <option value="3">Low</option>
                    </select>
                </div>
                <div class="form-group mt-1">
                  <input type="submit" class="btn btn-primary" id="formGroupExampleInput2" value="Add Ticket">
                </div>
              </form>
        </div>
      </div>
  </div>
@endsection