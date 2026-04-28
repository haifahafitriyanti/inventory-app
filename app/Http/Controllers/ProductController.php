<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function insert()
    {
        $product = new Product();
        $product->category_id = 1;
        $product->name = 'Baju Labor PNP';
        $product->price = 185000;
        $product->stock = 25;
        $product->description = 'Baju Laboratorium khusus Jurusan Teknologi Informasi';
        $product->status = 'tersedia';
        $product->save();

        dd($product);
    }

    public function update()
    {
        $product = Product::findOrFail(3);
        $product->name = 'Update Product';
        $product->price = 200000;
        $product->stock = 5;
        $product->description = 'Deskripsi produk yang di update';
        $product->status = 'tersedia';
        $product->save();

        dd($product);
    }

    public function delete()
    {
        $product = Product::findOrFail(5);
        $product->delete();

        dd('Produk Telah Dihapus');
    }

    public function index()
    {
        //Mengambil produk beserta kategori terkait
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }
    
}
