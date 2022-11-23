<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'duration',
        'price'
    ];

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
}
