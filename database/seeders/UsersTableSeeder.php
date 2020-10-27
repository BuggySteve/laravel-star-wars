<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {		
		DB::table('users')->insert([
            'uuid' => Str::uuid(),
            'name' => 'Luke Skywalker',
            'email' => 'luke@skywalker.com',
            'email_verified_at' => now(),
            'password' => Hash::make('iamyourfather'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
