<?php

use Illuminate\Database\Seeder;
use App\User;
//use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Emilija Dimovska',
            'email'    => 'emilijadimovska93@hotmail.com',
            'password' => Hash::make('1234567'),
        ));
        User::create(array(
            'name'     => 'Viktor Panchevski',
            'email'    => 'vik_mkd@yahoo.com',
            'password' => Hash::make('1234567'),
        ));
    }
}
