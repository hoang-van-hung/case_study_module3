<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /// protected $table='bills';
    use HasFactory;
    protected $fillable= [
        'customer_id',
        'status_id',
        'date_pay',
        'total_price',
    ];

    public function billDetail()
    {
        return $this->hasOne(BillDetail::class,'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'id','customer_id');
    }
}


