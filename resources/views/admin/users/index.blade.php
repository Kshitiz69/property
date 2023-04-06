@extends('templates.index')

@section('index_content')
    <div class="table-responsive">
        <table class="table" id="data-table">
            <thead>
            <tr class="text-left text-capitalize">
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->address}}</td>
                    <td>
{{--                        <a href="{{route($route.'show',$item->id)}}"--}}
{{--                           class="btn btn-sm btn-clean btn-icon btn-hover-primary"><i--}}
{{--                                class="fa fa-eye"></i></a>--}}

                        <form class="d-inline" action="{{ route($route.'destroy',$item->id) }}"
                              method="POST" onclick="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-clean btn-icon btn-hover-danger"><i
                                    class="fa fa-trash"></i></button>
                        </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $items->links() }}
@endsection

@push('scripts')
@endpush
