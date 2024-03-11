@extends('layouts.admin')

@section('content')

<div>
    <div class="row">
        <div class="col-md-12">

            @include('include.alert')

            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $slider->title }}" class="form-control"/>
                            @error('title') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control"/>
                            <img src="{{ asset("$slider->image") }}" style="width: 70px; height: 70px;" alt="Slider"/>
                        </div>
                        <div class="mb-3">
                            <label>Status</label></br>
                            <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked':'' }} style="width: 20px; height: 20px;"/> 
                            Checked=Hidden, Un-checked=Visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary text-white">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection