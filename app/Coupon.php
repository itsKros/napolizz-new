<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'coupon_type_id', 'discount', 'valid_till', 'is_active', 'min_price', 'food_id'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function coupon_type()
    {
        return $this->belongsTo(CouponType::class);
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }

    public function setValidTillAttribute($value)
    {
        $this->attributes['valid_till'] = (new Carbon($value))->format('Y-m-d');
    }
}
