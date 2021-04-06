<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $fillable= [
        'bill_id',
        'product_id',
        'quantity',
        'total_money',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class,'id','bill_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
}
