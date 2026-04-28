@extends('layouts.main')
@section('content')
<h1>Daftar Barang Inventaris</h1>

{{-- Tombol Tambah Data Otomatis --}}
<a href="/insert" class="btn btn-danger mb-3">Tambah Data Product</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category->name }}</td>
            <td>Rp {{ number_format($p->price) }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->description ?? '-' }}</td>
            <td>{{ $p->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection