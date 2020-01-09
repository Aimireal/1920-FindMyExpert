@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('successMsg'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Well done!</strong> {{session('successMsg')}}
            </div>
        @endif

            <table class="table table-bordered table-striped table-hover ">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Business Name</th>
                        <th class="text-center">Business Type</th>
                        <th class="text-center">First Name</th>
                        <th class="text-center">Last Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone Number</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($experts as $expert)
                    <tr>
                        <td>{{$expert->id}}</td>
                        <td>{{$expert->company_name}}</td>
                        <td>{{$expert->company_type}}</td>
                        <td>{{$expert->first_name}}</td>
                        <td>{{$expert->last_name}}</td>
                        <td>{{$expert->email}}</td>
                        <td>{{$expert->phone}}</td>

                        <td class="text-center">
                        <a class="btn btn-raised btn-primary btn-sm" href="{{route('edit', $expert->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <form
                                method="POST" id="delete-form-{{$expert->id}}"
                                action="{{route('delete',$expert->id)}}"
                                style="display: none;">

                                {{csrf_field()}}
                                {{method_field('delete')}}
                            </form>
                            <button onclick="if(confirm('Do you want to delete this Expert?'))
                            {
                                event.preventDefault();
                                document.getElementById('delete-form-{{$expert->id}}').submit();
                            }else
                            {
                                event.preventDefault();
                            }" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{$experts->links()}}
    </div>
@endsection