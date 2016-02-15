<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        Comment::create(array(
            'user_id'   => '1',
            'book_id'     => '1',
            'comment'    => 'This is a comment about book 1.',
        ));
        Comment::create(array(
            'user_id'   => '2',
            'book_id'     => '1',
            'comment'    => 'This is another comment about book 1.',
        ));
        Comment::create(array(
            'user_id'   => '1',
            'book_id'     => '2',
            'comment'    => 'This is a comment about book 2.',
        ));
        Comment::create(array(
            'user_id'   => '2',
            'book_id'     => '2',
            'comment'    => 'This is another comment about book 2.',
        ));
        Comment::create(array(
            'user_id'   => '1',
            'book_id'     => '3',
            'comment'    => 'This is a comment about book 3.',
        ));
        Comment::create(array(
            'user_id'   => '2',
            'book_id'     => '3',
            'comment'    => 'This is another comment about book 3.',
        ));
    }
}
