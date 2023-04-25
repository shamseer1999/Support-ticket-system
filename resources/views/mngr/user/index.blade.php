@extends('mngr.layouts.template')
@section('content')
<div class="card mt-1">
    <div class="card-header">
      Users List
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sl.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (sizeof($results) >0)
                        @foreach ($results as $item)
                            <tr>
                                <td>{{$results->firstItem() + $loop->index}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email }}</td>
                                <td>{{$item->roles->role_name}}</td>
                                <td class="p-1">
                                    <a href="{{route('user.edit',encrypt($item->id))}}" class="btn btn-sm bg-warning">Edit</a>
                                    {{-- <a href="{{route('role.delete',encrypt($item->id))}}" onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-sm bg-danger">Delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4">No data found</td>
                        </tr>
                    @endif
                </tbody>
              </table>
              {{$results->links()}}
        </div>
      </div>
  </div>
@endsection