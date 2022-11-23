<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentStates;
use Spatie\ModelStates\HasStates;

class Payment extends Model
{
    use HasFactory;

    use HasStates;

    protected $fillable = [
        'payment_code',
        'status_payment',
        'customer_id',
        'product_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
