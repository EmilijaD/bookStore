<?php

use Illuminate\Database\Seeder;
use App\Rating;

class RatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->delete();
        Rating::create(array(
            'user_id'   => '1',
            'book_id'     => '1',
            'rating'    => '7',
        ));
        Rating::create(array(
            'user_id'   => '1',
            'book_id'     => '2',
            'rating'    => '8',
        ));
        Rating::create(array(
            'user_id'   => '1',
            'book_id'     => '3',
            'rating'    => '9',
        ));
        Rating::create(array(
            'user_id'   => '2',
            'book_id'     => '1',
            'rating'    => '9',
        ));
        Rating::create(array(
            'user_id'   => '2',
            'book_id'     => '3',
            'rating'    => '9',
        ));
    }
}
