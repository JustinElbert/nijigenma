<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','category_id', 'user_id','slug','src','body','price'];
    protected $with = ['category', 'author'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPriceAttribute($value)
    {
        // Assuming you want to display the price with commas as thousand separators
        return number_format($value, 0, ',', '.');
    }
}
