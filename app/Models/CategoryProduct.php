<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryProduct extends Pivot
{
    public $timestamps = true;
    
    protected $fillable = [
        'category_id',
        'product_id',
        'created_at',
        'updated_at',
    ];
}
