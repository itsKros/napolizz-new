<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
   protected $fillable = ['name', 'description', 'price', 'is_active', 'thumb_url'];

    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }
}
