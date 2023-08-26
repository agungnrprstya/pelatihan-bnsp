<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('content.listProduct', compact('data'));
    }
    public function addCart()
    {
        return view('content.addCart');
    }
    public function add(Request $req)
    {
        $add = Product::create([
            'nama_produk' => $req->nama,
            'jumlah' => $req->jumlah,
            'harga_total' => $req->harga_total
        ]);
        if ($add) {
            return redirect('/dashboard');
        } else {
            return false;
        }
    }
    public function editCart($id)
    {
        $data = Product::where('id', $id)->first();
        return view('content.editCart', compact('data'));
    }
    public function save(Request $req)
    {
        $product = Product::find($req->id);
        $product->nama_produk = $req->nama;
        $product->jumlah = $req->jumlah;
        $product->harga_total = $req->harga_total;
        $product->save();
        return redirect('/dashboard');
    }
    public function deleteProduct($id)
    {
        $delete = DB::table('cart')->delete($id);
        if ($delete) {
            return redirect('/dashboard');
        }
    }

    public function dashboard()
    {
        $data = Product::all();
        return view('dashboard', compact('data'));
    }
}
