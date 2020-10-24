<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = ['name', 'description', 'thumb_url'];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

}
