<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = ['name', 'is_active', 'address', 'phone', 'city', 'state', 'postal_code'];

}
