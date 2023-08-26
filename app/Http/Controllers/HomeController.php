<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = Cart::all();
        return view('content.listProduct', compact('data'));
    }
    public function addCart()
    {
        return view('content.addCart');
    }
    public function add(Request $req)
    {
        $add = Cart::create([
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
        $data = Cart::where('id', $id)->first();
        return view('content.editCart', compact('data'));
    }
    public function save(Request $req)
    {
        $cart = Cart::find($req->id);
        $cart->nama_produk = $req->nama;
        $cart->jumlah = $req->jumlah;
        $cart->harga_total = $req->harga_total;
        $cart->save();
        return redirect('/dashboard');
    }

    public function deleteCart($id)
    {
        $delete = DB::table('cart')->where('id', $id)->delete();
        if ($delete) {
            return redirect('/dashboard');
        }
    }


    public function dashboard()
    {
        $data = Cart::all();
        return view('dashboard', compact('data'));
    }
}
