@extends('layouts.main')

@section('title')
Update Data Product
@endsection

@section('content')
<h1>Update Data Product</h1>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<form action="/update-products/{{ $product->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="name" name="name"
            value="{{ old('name', $product->name) }}" required>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select class="form-select" id="category_id" name="category_id" required>
            <option value="">Pilih Kategori</option>
            @foreach($categories as $c)
            <option value="{{ $c->id }}"
                {{ $product->category_id == $c->id ? 'selected' : '' }}>
                {{ $c->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Harga</label>
        <input type="number" class="form-control" id="price" name="price"
            value="{{ old('price', $product->price) }}" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" class="form-control" id="stock" name="stock"
            value="{{ old('stock', $product->stock) }}" required>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
            <option value="">Pilih Status</option>
            <option value="tersedia" {{ $product->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="habis" {{ $product->status == 'habis'    ? 'selected' : '' }}>Habis</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">
            Deskripsi <span class="text-muted">(opsional)</span>
        </label>
        <textarea class="form-control" id="description" name="description"
            rows="3">{{ old('description', $product->description) }}</textarea>
    </div>

    <a href="/products" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection