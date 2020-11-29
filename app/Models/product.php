<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
    'nama',
    'sku',
    'harga_modal',
    'harga_jual',
    'product_categories_id',
    'product_units_id'
];
}
