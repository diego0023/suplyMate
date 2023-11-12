<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Supplier::create([
            'name'  => 'test',
            'nit'   => '123456789',
            'phone' => '12345678',
            'email' => 'test@test.com',
        ]);

        Product::create([
            'name'            => 'A',
            'supplier_id'     =>  1,
            'stock_inventory' => '500',
            'supply_time'     => '1',
            'security_stock'  => '100',
            'lot_quantity'    => '500',

        ]);

        Product::create([
            'name'            => 'B',
            'supplier_id'     =>  1,
            'stock_inventory' => '1000',
            'supply_time'     => '2',
            'security_stock'  => '200',
            'lot_quantity'    => '1000',

        ]);

        Product::create([
            'name'            => 'C',
            'supplier_id'     => 1,
            'stock_inventory' => '600',
            'supply_time'     => '3',
            'security_stock'  => '100',
            'lot_quantity'    => '1500',

        ]);
    }
}
