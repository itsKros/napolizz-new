<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComboFood extends Model
{
   protected $fillable = [ 'food_id', 'combo_id'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function combo()
    {
        return $this->belongsTo(Combo::class);
    }

}
