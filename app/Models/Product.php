<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected  $table = 'cart';

    protected $fillable = [
        'nama_produk',
        'jumlah',
        'harga_total'
    ];
}
