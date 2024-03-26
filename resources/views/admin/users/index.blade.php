@extends('layouts.admin')

@section('title', 'Users List')

@section('content')
<div>
    <div class="row">
        <div class="col-md-12">

            @include('include.alert')

            <div class="card">
                <div class="card-header">
                    <h3>
                        Users
                        <a href="{{ route('create.user') }}" class="btn btn-primary btn-sm text-white float-end">Add User</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role_as == '0')
                                        <label class="badge btn-primary">User</label>   
                                    @elseif ($user->role_as == '1')
                                        <label class="badge btn-success">Admin</label> 
                                    @else
                                        <label class="badge btn-danger">none</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('edit.user',$user->id) }}" class="btn btn-success btn-sm">
                                        Edit
                                    </a>
                                    <a href="{{ route('delete.user',$user->id) }}" 
                                        onclick="return confirm('Are you sure, you want to delete this data')" 
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Users Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $users->links() }}   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
