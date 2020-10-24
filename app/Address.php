<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_id', 'address', 'phone', 'city', 'state', 'postal_code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
