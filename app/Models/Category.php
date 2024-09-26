<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_category');
    }
}
