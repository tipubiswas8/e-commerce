<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => "My Category",
            'slug' => "my-category"

            /* in here,
             'name' is categories table column name 
             'slug' is categories table column name 


             "My Category" is the value that is insert into categories table name field
             "my-category" is the value that is insert into categories table slug field
             */
        ]);
    }
}
