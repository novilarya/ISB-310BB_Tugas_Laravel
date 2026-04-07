<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'brand_id';
    public $timestamps = false;
    protected $fillable = [
        'brand_id',
        'brand_name',
        'brand_manufacture'
    ];

    public function brands()
    {
        return $this->hasMany(brand::class, 'brand_id', 'brand_id');
    }
}
