<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        Category::create(array(
            'category_name'     => 'Applications and Software'
        ));
        Category::create(array(
            'category_name'     => 'Artificial Intelligence (AI)'
        ));
        Category::create(array(
            'category_name'     => 'Computers - General'
        ));
        Category::create(array(
            'category_name'     => 'Database Management'
        ));
        Category::create(array(
            'category_name'     => 'Design Patterns'
        ));
        Category::create(array(
            'category_name'     => 'Enterprise Systems'
        ));
        Category::create(array(
            'category_name'     => 'Hardware'
        ));
        Category::create(array(
            'category_name'     => 'Mathematics'
        ));
        Category::create(array(
            'category_name'     => 'Networking'
        ));
        Category::create(array(
            'category_name'     => 'Operating Systems'
        ));
        Category::create(array(
            'category_name'     => 'WWW and Internet'
        ));
    }
}
