<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    protected $fillable = ['name', 'description', 'price', 'thumb_url', 'is_active', 'lunch_promotion'];

    public function addons()
    {
        return $this->belongsToMany(Addon::class);
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }
}
