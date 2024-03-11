@extends('layouts.admin')

@section('content')

<div>
    <div class="row">
        <div class="col-md-12">

            @include('include.alert')

            <div class="card">
                <div class="card-header">
                    <h3>
                        Add Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/create') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Color Name</label>
                            <input type="text" name="name" class="form-control"/>
                            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label>Color Code</label>
                            <input type="text" name="code" class="form-control"/>
                            @error('code') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label>Status</label></br>
                            <input type="checkbox" name="status" style="width: 20px; height: 20px;"/> Checked=Hidden, Un-checked=Visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary text-white">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection