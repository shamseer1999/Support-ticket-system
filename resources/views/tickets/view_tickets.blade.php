@extends('mngr.layouts.template')
@section('content')
<div class="card mt-1">
    <div class="card-header">
      Ticket Details
    </div>
    <div class="card">
        <div class="card-body">
            <p>Ticket : {{$viewdata->title}}</p>
            <p>Message : {{$viewdata->message}}</p>
            <div class="bg-light p-2">
                <h6>Assigned Agents</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Sl.No</th>
                        <th scope="col">Agent Name</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (!empty($viewdata->agents))
                        @php
                            $var=1;
                        @endphp
                            @foreach ($viewdata->agents as $item)
                                <tr>
                                    <td>{{$var++}}</td>
                                    <td>{{$item->name}}</td>
                                </tr>
                            @endforeach
                        @else
                                <tr>
                                    <td colspan="2">No record found</td>
                                </tr>
                        @endif
                    </tbody>
                </table>
            </div><br>
            <div class="bg-light p-2">
                <h6>Comments</h6>
            </div>
            
        </div>
      </div>
  </div>
@endsection