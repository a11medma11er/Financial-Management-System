@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Users</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Users
                    Management
                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="col-sm-6 col-md-6 col-xl-2 mg-t-20">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a> --}}
                                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $data->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
@endsection
