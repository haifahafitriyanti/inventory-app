@extends('layouts.main')
@section('content')
<h1>Daftar Barang Inventaris </h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama Barang </th>
            <th>Kategori </th>
            <th>Harga </th>
            <th>Stok </th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->name }} </td>
            <td>{{ $p->category->name }} </td>
            <td>Rp {{ number_format($p->price) }} </td>
            <td>{{ $p->stock }} </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection