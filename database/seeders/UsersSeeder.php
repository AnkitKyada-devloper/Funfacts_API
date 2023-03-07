<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Users::insert([
            'first_name'=>'ankit',
            'last_name'=>'kyada',
            'email' =>'ankitkyada23@gmail.com',
            'password' => bcrypt('123456789'),
            'phone_number'=>985647856,
            'gender'=>'male'
        ]);
        Users::insert([
            'first_name'=>'jaymin',
            'last_name'=>'shah',
            'email' =>'jaymin.shah@theopeneyes.in',
            'password' => bcrypt('987654321'),
            'phone_number'=>985647856,
            'gender'=>'male'
        ]);
    }
}
 
            
        