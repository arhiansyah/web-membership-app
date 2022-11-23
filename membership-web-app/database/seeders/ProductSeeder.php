<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'title' => 'Paket Basic',
                'slug' => 'basic',
                'duration' => '1 Month',
                'price' => 50000
            ],
            [
                'title' => 'Paket Middle',
                'slug' => 'middle',
                'duration' => '3 Month',
                'price' => 130000
            ],
            [
                'title' => 'Paket Advance',
                'slug' => 'advance',
                'duration' => '6 Month',
                'price' => 250000
            ],

        ])->each(function ($data) {
            Product::create($data);
        });
    }
}
