<?php

use Illuminate\Database\Seeder;
use App\tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(tag::class,10)->create();
    }
}
