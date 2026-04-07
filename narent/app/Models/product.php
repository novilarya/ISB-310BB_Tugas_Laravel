<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    public $timestamps = false;
    protected $fill_able = [
        'product_id',
        'category_id',
        'brand_id',
        'product_name',
        'product_price',
        'product_stock'
    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id', 'brand_id');
    }
}
