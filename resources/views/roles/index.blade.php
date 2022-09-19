@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Roles</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Roles
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
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        {{-- <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a> --}}
                                        @can('role-edit')
                                            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                        @endcan
                                        @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $roles->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
@endsection