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
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0 ">
            <div class="card-header">
                <h4 class="card-title mb-1">Edit Role</h4>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="">
                        <div class="form-group">
                            <strong>Name</strong>
                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <strong class="d-block">Permission</strong>
                            <br />
                            @foreach ($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                    {{ $value->name }}</label>
                                <br />
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
@endsection
@section('js')
@endsection