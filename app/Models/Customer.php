<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected  $fillable=[
        'name',
        'address',
        'phone',
        'email',
    ];

    public function Bills()
    {
        return $this->hasMany(Bill::class,'customer_id','id');
    }
}
