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

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_category');
    }

    protected function casts(): array
    {
        return [
            'image' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }
}
