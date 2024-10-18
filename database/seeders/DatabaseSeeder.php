<?php

namespace Database\Seeders;

// use App\Models\User;
use App\Models\Items;
use App\Models\Order_items;
use App\Models\Orders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Items::factory()->create([
            'item_id' => 1001,
            'item_name' => 'coke',
            'price' => 20,
            'quantity' => 1,
            'is_active' => 1
        ]);
        Orders::factory()->create([
            'order_id' => 2001,
            'transaction_no' => 123456789,
            'customer_name' => 'bren caivan salamat',
            'order_status' => 1,
        ]);
        Order_items::factory()->create([
            'order_id' => 3001,
            'order_id' => 2001,
            'item_id' => 1001,
            'quantity' => 3,
            'unit_price' => 60
    ]);

    
    }
}
