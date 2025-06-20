<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['categori_id', 'name', 'slug', 'description', 'image', 'proce', 'stock'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('qty', 'price')->withTimestamp();
    }

}
