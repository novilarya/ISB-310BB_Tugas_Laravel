<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $timestamps = false;
    protected $fillable = [
        'category_id',
        'category_name'
    ];

    public function category()
    {
        return $this->hasMany(category::class, 'category_id', 'category_id');
    }
}
