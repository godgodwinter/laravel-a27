<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'customers_id',
        'tgl_penjualan',
        'total_bayar',
        'pembayaran_tunai',
        'diskon',
        'harus_dibayar',
        'pengembalian',
        'total_diskon'
    ];
}
