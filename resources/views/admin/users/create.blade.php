@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
<div>
    <div class="row">
        <div class="col-md-12">

            @include('include.alert')

            <div class="card">
                <div class="card-header">
                    <h3>
                        Create User
                        <a href="{{ route('view.users') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="{{ route('store.user') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <lable>Name</lable>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <lable>Email</lable>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                                @error('email') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <lable>Password</lable>
                                <input type="password" name="password" class="form-control">
                                @error('password') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <lable>Select Role</lable>
                                <select name="role_as" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                                @error('role_as') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection