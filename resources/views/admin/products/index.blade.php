@extends('layouts.admin')

@section('content')
<div>
    <div class="row">
        <div class="col-md-12">

            @include('include.alert')

            <div class="card">
                <div class="card-header">
                    <h3>
                        Products
                        <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm text-white float-end">Add Product</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Brand</th>
                                <th>Selling Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if($product->category)
                                        {{ $product->category->name }}
                                    @else
                                        No Category
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->brand }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->status == '1' ? 'Hidden':'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Are you sure, you want to delete this data')" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No Product Available</td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>

                    <div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
