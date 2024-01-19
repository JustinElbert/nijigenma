<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

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

    public function sluggable(): array{
        return[
            'slug' => [ 'source' => 'title']
        ];
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 0, ',', '.');
    }
}
