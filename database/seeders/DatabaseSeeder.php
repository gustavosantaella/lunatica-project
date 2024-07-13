<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $user = User::first();
        if(!$user){
            $user = User::create([
                'name' => 'Test User',
                'email' => 'admin@test.com',
            ]);
        }

        $provider = Provider::create([
            "name" => str("shein")->upper(),
            "address" => str("USA NY 45")->upper(),
            "phone" => str("+xxxxxxx")->upper(),
        ]);

        Customer::create([
            "name" => "Gustavo",
            "phone" => "+xxxxxx",
            "email" => "customer@test.com",
        ]);

        Product::create([
            "name" => str("short")->upper(),
            "brand" => str("sheing")->upper(),
            "stock" => random_int(1, 100),
            "price" => rand(1, 100),
            "provider_id" => $provider->id,
        ]);


    }
}
