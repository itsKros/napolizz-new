<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price', 'thumb_url', 'is_active'];
    protected $table = 'foods';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function addons()
    {
        return $this->belongsToMany(Addon::class);
    }
}
