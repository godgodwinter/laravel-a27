<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers_category extends Model
{
    // protected $table = 'product_stocts';
    use HasFactory;
    protected $fillable = [
        'nama'
    ];
    public function customer() { 
        return $this->hasMany('App\Models\customer', 'id'); 
    }
}
