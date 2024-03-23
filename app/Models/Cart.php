<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'post_id', 'orderId','src', 'title', 'price', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
