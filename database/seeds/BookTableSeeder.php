<?php

use Illuminate\Database\Seeder;
use App\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->delete();
        Book::create(array(
            'title'     => 'Head First Design Patterns',
            'authors'    => 'Eric Freeman, Elisabeth Freeman, Bert Bates, Kathy Sierra',
            'approved' => false,
            'summary' => 'A Brain-Friendly Guide',
        ));
        Book::create(array(
            'title'     => 'Software Systems Architecture',
            'authors'    => 'Nick Rozanski, Eoin Woods',
            'approved' => true,
            'summary' => 'Working With Stakeholders Using Viewpoints and Perspectives',
        ));
        Book::create(array(
            'title'     => 'Refactoring: Improving the Design of Existing Code',
            'authors'    => 'Martin Fowler, Kent Beck, John Brant, William Opdyke, don Roberts',
            'approved' => true,
            'summary' => 'Improving the Design of Existing Code shows how refactoring can make object-oriented code simpler and easier
to maintain.',
        ));
    }
}
