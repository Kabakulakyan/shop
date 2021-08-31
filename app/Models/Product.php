<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    public $table = "product";

    public function user()
    {
        return $this->belongsTo(User::class);
        
    }
    public function categor()
    {
        return $this->belongsTo(Category::class);
        
    }
    public function image()
    {
        return $this->hasMany(Image::class);
        
    }
}

