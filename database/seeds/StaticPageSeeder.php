<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('static_pages')->insert([
        //     'title'=>Str::random(10),
        //     'url'=>Str::random(8),
        //     'content'=>Str::random(50)
        // ]);
        factory(App\static_page::class,10)->create();

    }
}
