@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h3>Edit Product</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

<div class="mb-3">
    <label>Category</label>
    <select name="more_parent_id" class="form-select" required>
        <option value="">-- Select Category --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ (isset($selectedCategory) && $selectedCategory == $category->id) ? 'selected' : '' }}>
                {{ $category->parent ? $category->parent->name.' > ' : '' }}{{ $category->name }}
            </option>
        @endforeach
    </select>
</div>



        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $product->name }}" required />
        </div>

        <div class="mb-3">
            <label>SKU</label>
            <input type="text" name="sku" class="form-control"
                   value="{{ $product->sku }}" required />
        </div>

        <div class="mb-3">
            <label>Price (₹)</label>
            <input type="number" step="0.01" name="price" class="form-control"
                   value="{{ $product->price }}" required />
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control"
                   value="{{ $product->quantity }}" required />
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
