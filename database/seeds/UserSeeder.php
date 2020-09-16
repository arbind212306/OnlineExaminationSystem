<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Arbind',
            'email' => 'arbind@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => 9337180770,
            'gender' => "male",
            'address' => "Keonjhar",
            'created_at' => Carbon::now()
        ]);
    }
}
