<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('products')->insert([
            'product_name'=>'Product 1',
            'quantity'=>10,
            'price'=>50
        ]);
        DB::table('users')->insert([
            'name'=>'user 1',
            'email'=>'user1@gmail.com',
            'password'=>'123',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
    }
}
