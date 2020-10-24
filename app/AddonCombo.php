<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddonCombo extends Model
{
   protected $fillable = [ 'addon_id', 'combo_id'];

    public function combo()
    {
        return $this->belongsTo(Food::class);
    }

    public function addon()
    {
        return $this->belongsTo(Addon::class);
    }

}
