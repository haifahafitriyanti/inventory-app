@extends('layouts.main')
@section('title')
    Halaman Data Product
@endsection
@section('content')
<h1>Daftar Barang Inventaris</h1>
{{-- Notifikasi --}}
@if(session('success'))
<div id="alert-success" class="alert alert-dismissible fade show border-0 shadow-sm" role="alert"
    style="background: linear-gradient(135deg, #d4edda, #c3e6cb); border-left: 5px solid #28a745 !important;">
    <div class="d-flex align-items-center gap-2">
        <span style="font-size: 1.4rem;"></span>
        <div>
            <strong>Berhasil!</strong>
            <div>{{ session('success') }}</div>
        </div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

@if(session('error'))
<div id="alert-error" class="alert alert-dismissible fade show border-0 shadow-sm" role="alert"
    style="background: linear-gradient(135deg, #f8d7da, #f5c6cb); border-left: 5px solid #dc3545 !important;">
    <div class="d-flex align-items-center gap-2">
        <span style="font-size: 1.4rem;"></span>
        <div>
            <strong>Gagal!</strong>
            <div>{{ session('error') }}</div>
        </div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

<a href="/create" class="btn btn-secondary mb-3">Tambah Data Baru</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage()}}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category->name }}</td>
            <td>Rp {{ number_format($p->price) }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->description ?? '-' }}</td>
            <td>{{ $p->status }}</td>
            <td>
                <a href="/update-products/{{ $p->id }}" class="btn btn-warning btn-sm">Update</a>
                <form action="/products/{{ $p->id }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus {{ $p->name }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links() }}
<script>
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(el => {
            el.classList.remove('show');
            setTimeout(() => el.remove(), 300);
        });
    }, 3000);
</script>
@endsection