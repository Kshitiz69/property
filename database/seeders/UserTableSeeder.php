<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'Admin',
            'phone' => '9846012345',
            'address' => 'Pokhara',
            'email' => 'admin@property.com',
            'email_verified_at' => '2023-01-01',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);
        $user->save();
    }
}
