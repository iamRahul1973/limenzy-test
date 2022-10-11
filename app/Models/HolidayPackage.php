<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayPackage extends Model
{
    use HasFactory;

    public $guarded = [];

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function scopeNotExpired($query)
    {
        return $query->whereDate('expires_on', '>', now()->format('Y-m-d'));
    }
}
