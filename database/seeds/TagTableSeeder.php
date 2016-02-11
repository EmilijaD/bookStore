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
        Tag::create(array(
            'book_id'     => '4',
            'tag'    => 'Computer Programming',
        ));
        Tag::create(array(
            'book_id'     => '5',
            'tag'    => 'Networking',
        ));
        Tag::create(array(
            'book_id'     => '6',
            'tag'    => 'Mathematics',
        ));
        Tag::create(array(
            'book_id'     => '7',
            'tag'    => 'Networking',
        ));
        Tag::create(array(
            'book_id'     => '8',
            'tag'    => 'Mathematics',
        ));
        Tag::create(array(
            'book_id'     => '9',
            'tag'    => 'Artificial Intelligence (AI)',
        ));
        Tag::create(array(
            'book_id'     => '10',
            'tag'    => 'Mathematics',
        ));
        Tag::create(array(
            'book_id'     => '11',
            'tag'    => 'Artificial Intelligence (AI)',
        ));
        Tag::create(array(
            'book_id'     => '12',
            'tag'    => 'Hardware',
        ));
        Tag::create(array(
            'book_id'     => '13',
            'tag'    => 'Database Management',
        ));
    }
}
