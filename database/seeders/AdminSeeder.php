<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('123'),
                'is_admin' => true,
            ]
            ];
             User::insert($admin);
    }
}
