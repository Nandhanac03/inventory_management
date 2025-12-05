@extends('layouts.apps')

@section('content')
<div class="container mt-4">

    <!-- Dashboard Cards -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text fs-3">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Categories</h5>
                    <p class="card-text fs-3">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <form method="GET" class="row mb-4">
        <div class="col-md-4 mb-2">
            <input type="text" name="search" class="form-control" placeholder="Search by name or SKU" value="{{ request('search') }}">
        </div>
        <div class="col-md-4 mb-2">
            <select name="category_id" class="form-select">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 mb-2">
            <select name="sort_by" class="form-select">
                <option value="">Sort By</option>
                <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Price</option>
                <option value="quantity" {{ request('sort_by') == 'quantity' ? 'selected' : '' }}>Quantity</option>
            </select>
        </div>
        <div class="col-md-2 mb-2">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <!-- Product Grid -->
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm">
                <!-- Placeholder image -->
                
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-muted">{{ $product->category ? $product->category->name : 'Unassigned' }}</p>
                    <p class="card-text fw-bold">₹{{ number_format($product->price, 2) }}</p>
                    <p class="card-text">Stock: {{ $product->quantity }}</p>
                    <p class="card-text">Description: {{ $product->description }}</p>

                    <div class="mt-auto">
                       
                        <!-- <a href="#" class="btn btn-sm btn-outline-primary w-100">View Details</a> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

  
    <div class="mt-3 d-flex justify-content-center">
        {{ $products->withQueryString()->links() }}
    </div>

</div>
@endsection
