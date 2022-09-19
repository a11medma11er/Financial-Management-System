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
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Name</strong>
                                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Password</strong>
                                    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Confirm Password</strong>
                                    {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        {{-- 3 --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Role</strong>
                                    {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
    <!-- row closed -->
</div>
                    
@endsection
@section('js')
@endsection

