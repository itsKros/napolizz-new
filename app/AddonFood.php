<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddonFood extends Model
{
   protected $fillable = [ 'addon_id', 'food_id'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function addon()
    {
        return $this->belongsTo(Addon::class);
    }

}
