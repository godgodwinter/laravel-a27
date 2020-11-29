<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
  
    protected $table = 'customers';
    use HasFactory;
    protected $fillable = [
        'nik',
        'name',
        'phone',
        'address',
        'customers_categories_id'
    ];

    public function customers_categories()
    {
        return $this->belongsTo('App\Models\customers_category', 'id');
    }
}



