@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Admin Dashboard</h4>
        </div>

        <div class="card-body">
            <p>Welcome, {{ Auth::user()->name }}!</p>

            <div class="row mt-4">
                <div class="col-md-6">
                    <a href="{{ route('categories.index') }}" class="btn btn-warning w-100 mb-3">
                        Manage Categories
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('products.index') }}" class="btn btn-success w-100 mb-3">
                        Manage Products
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
