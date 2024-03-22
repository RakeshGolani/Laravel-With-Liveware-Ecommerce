@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
<div>
    <div class="row">
        <div class="col-md-12">

            @include('include.alert')

            {{-- @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif --}}

            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit User
                        <a href="{{ route('view.users') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="{{ route('update.user',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <lable>Name</lable>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <lable>Email</lable>
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control">
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
                                    <option value="0" {{ $user->role_as == '0' ? 'selected':'' }}>User</option>
                                    <option value="1" {{ $user->role_as == '1' ? 'selected':'' }}>Admin</option>
                                </select>
                                @error('role_as') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection