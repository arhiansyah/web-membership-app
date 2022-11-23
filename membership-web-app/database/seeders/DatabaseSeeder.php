<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionDemoSeeder::class);
        $this->call(ProductSeeder::class);


        $payment = Payment::create([
            'payment_code' => 'BPCSR-' . rand(100, 1000),
            'status_payment' => 'PAID',
            'customer_id' => 1,
            'product_id' => 1
        ]);
    }
}
