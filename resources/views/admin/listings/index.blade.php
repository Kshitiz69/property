@extends('templates.index')


@section('index_content')
    <div class="table-responsive">
        <table class="table" id="data-table">
            <thead>
            <tr class="text-left text-capitalize">
                <th>#ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Location</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>Rs. {{$item->price}}</td>
                    <td>{{Str::limit($item->location, 35)}}</td>
                    <td>{{$item->description?Str::limit($item->description, 25):'N/A'}}</td>
                    <td>
                        <a href="{{route($route.'edit', $item->id)}}" target="_blank"
                           class="btn btn-sm btn-clean btn-icon btn-hover-primary"><i
                                class="fa fa-pencil-alt"></i></a>

                        <a href="{{url('/')}}" target="_blank"
                           class="btn btn-sm btn-clean btn-icon btn-hover-primary"><i
                                class="fa fa-eye"></i></a>

                        <form class="d-inline" action="{{route($route.'destroy', $item->id)}}"
                              method="POST" onclick="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-clean btn-icon btn-hover-danger"><i
                                    class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $items->links() }}
@endsection
