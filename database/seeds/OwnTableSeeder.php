<?php

use Illuminate\Database\Seeder;
use App\Own;

class OwnTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owns')->delete();
        Own::create(array(
            'user_id'   => '1',
            'book_id'     => '1',
        ));
        Own::create(array(
            'user_id'   => '1',
            'book_id'     => '2',
        ));
        Own::create(array(
            'user_id'   => '1',
            'book_id'     => '3',
        ));
        Own::create(array(
            'user_id'   => '2',
            'book_id'     => '1',
        ));
    }
}
