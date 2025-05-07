<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // User::create([
        //     // 'name' => 'Geky',
        //     'app_id' => 'Admin',
        //     'email' => 'admin@prioritysolutionsagency.com',
        //     'role' => 'admin',
        //     'password' => Hash::make('1234qwer'),
        // ]);
        

    $this->call(PostSeeder::class);


    }
}
