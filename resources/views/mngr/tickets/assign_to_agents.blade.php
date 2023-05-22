@extends('mngr.layouts.template')
@section('content')
<div class="card mt-1">
    <div class="card-header">
      Assign To Agents
    </div>
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                  <label for="formGroupExampleInput"> Title</label>
                  <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Enter Your Title" readonly value="{{$ticket->title}}" required>
                </div>
                <div class="form-group">
                    <label for="">Agents</label><br>
                    <select name="agent" class="form-control" id="" required>
                        <option value="">--SELECT--</option>
                        @if (!empty($agents))
                      @foreach ($agents as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                  @endif
                    </select>
                    
                </div>
                <div class="form-group mt-1">
                  <input type="submit" class="btn btn-primary" id="formGroupExampleInput2" value="Assign Ticket">
                </div>
              </form>
        </div>
      </div>
  </div>
@endsection