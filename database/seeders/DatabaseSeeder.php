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
                "password" => bcrypt("password"),
            ]);
        }



        Customer::create([
            "nombre" => "Gustavo",
            "tlfn" => "+xxxxxx",
            "correo" => "customer@test.com",
        ]);

        Product::create([
            "nombre" => str("short")->upper(),
            // "foto" => str("sheing")->upper(),
            "precio" => random_int(1, 100),
            "cantidad" => rand(1, 100),
        ]);


    }
}
