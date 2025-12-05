<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
     protected $fillable = [
        'name',
        'sku',
        'price',
        'quantity',
        'description',
        'status',
        'more_parent_id'
    ];

 // Single category
    public function category()
    {
        return $this->belongsTo(Category::class, 'more_parent_id');
    }
    public function categories()
{
    return $this->belongsToMany(Category::class);
}

}
