<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();
        Tag::create(array(
            'book_id'     => '1',
            'tag'    => 'Design Patterns',
        ));
        Tag::create(array(
            'book_id'     => '1',
            'tag'    => 'Brain-Friendly',
        ));
        Tag::create(array(
            'book_id'     => '1',
            'tag'    => 'Nice Guide',
        ));
        Tag::create(array(
            'book_id'     => '2',
            'tag'    => 'software',
        ));
        Tag::create(array(
            'book_id'     => '2',
            'tag'    => 'system architecture',
        ));
        Tag::create(array(
            'book_id'     => '3',
            'tag'    => 'improving design',
        ));
        Tag::create(array(
            'book_id'     => '3',
            'tag'    => 'refactoring',
        ));
        Tag::create(array(
        'book_id'     => '3',
        'tag'    => 'object-oriented code',
    ));
    }
}
