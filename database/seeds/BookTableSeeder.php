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
        Book::create(array(
            'title'     => 'Learning iOS Development: A Hands-on Guide to the Fundamentals of iOS Programming',
            'authors'    => 'Maurice Sharp, Erica Sadun, Rod Strougo',
            'approved' => true,
            'summary' => 'Computer Programming',
        ));
        Book::create(array(
            'title'     => 'Introduction to Networks Companion Guide',
            'authors'    => 'Cisco Networking Academy',
            'approved' => true,
            'summary' => 'Networking',
        ));
        Book::create(array(
            'title'     => 'Calculus: Early Transcendentals',
            'authors'    => 'James Stewart',
            'approved' => true,
            'summary' => 'Mathematics',
        ));
        Book::create(array(
            'title'     => 'Security+ Guide to Network Security Fundamentals',
            'authors'    => 'Mark Ciampa',
            'approved' => true,
            'summary' => 'Networking',
        ));
        Book::create(array(
            'title'     => 'Calculus: An Applied Approach',
            'authors'    => 'Ron Larson',
            'approved' => true,
            'summary' => 'Mathematics',
        ));
        Book::create(array(
            'title'     => 'When Things Start to Think',
            'authors'    => 'Neil Gershenfeld',
            'approved' => true,
            'summary' => 'Artificial Intelligence (AI)',
        ));
        Book::create(array(
            'title'     => 'College Algebra',
            'authors'    => 'Ron Larson',
            'approved' => true,
            'summary' => 'Mathematics',
        ));
        Book::create(array(
            'title'     => 'Next Fifty Years: Science in the First Half of the Twenty-First Century',
            'authors'    => 'John Brockman',
            'approved' => true,
            'summary' => 'Artificial Intelligence (AI)',
        ));
        Book::create(array(
            'title'     => 'Computer Organization and Design: The Hardware/Software Interface',
            'authors'    => 'David A. Patterson',
            'approved' => true,
            'summary' => 'Hardware',
        ));
        Book::create(array(
            'title'     => 'Introducing Microsoft SQL Server 2012',
            'authors'    => 'Ross Mistry, Stacia Misner',
            'approved' => true,
            'summary' => 'Database Management',
        ));
        Book::create(array(
            'title'     => 'A Practical Guide to Linux Commands, Editors, and Shell Programming',
            'authors'    => 'Mark G. Sobell',
            'approved' => true,
            'summary' => 'Operating system',
        ));
        Book::create(array(
            'title'     => 'Programming in Objective-C',
            'authors'    => 'Stephen G. Kochan',
            'approved' => true,
            'summary' => 'Programming',
        ));
        Book::create(array(
            'title'     => 'Introduction to Java Programming, Comprehensive Version',
            'authors'    => 'Y. Daniel Liang',
            'approved' => true,
            'summary' => 'Programming',
        ));
        Book::create(array(
        'title'     => 'JavaScript and JQuery: Interactive Front-End Web Development',
        'authors'    => 'Jon Duckett',
        'approved' => true,
        'summary' => 'WWW and Internet',
    ));
    }
}
