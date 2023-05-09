@extends('mngr.layouts.template')
@section('content')
<div class="card mt-1">
    <div class="card-header">
      Tickets List
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sl.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Message</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Labels</th>
                    <th scope="col">User</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (sizeof($results) >0)
                        @foreach ($results as $item)
                            <tr>
                                <td>{{$results->firstItem() + $loop->index}}</td>
                                <td>{{$item->title}}</td>
                                <td>{!! nl2br(wordwrap($item->message, 20, "<br>", true)) !!}</td>
                                <td>
                                    @if ($item->priority ==1)
                                        <label for="" class="text-danger">{{"High"}}</label>
                                    @elseif($item->priority ==2)
                                        <label for="" class="text-warning">{{"Medium"}}</label>
                                    @else
                                        <label for="" class="">{{"Low"}}</label>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->categories))
                                        @foreach ($item->categories as $category)
                                        &rarr;{{$cat = $category->category_name}}
                                            <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->labels))
                                        @foreach ($item->labels as $label)
                                        &rarr;{{$label->label_name}}
                                        <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    {{$item->users->name}}
                                </td>
                                <td class="p-1">
                                    <a href="{{route('role.edit',encrypt($item->id))}}" ><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('role.delete',encrypt($item->id))}}" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-remove"></i></a>
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