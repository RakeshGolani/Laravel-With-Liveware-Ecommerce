@extends('layouts.app')

@section('title', 'Thank You for Shopping')

@section('content')

    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(session('message'))
                    <div class="alert alert-success mb-2">{{ session('message') }},</div>
                    @endif
                    
                    <div class="p-4 shadow bg-white">
                        <h2>You Logo</h2>
                        <h4>Thank You for Shopping with Laravel Ecommerce</h4>
                        <a href="{{ url('/collections') }}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection