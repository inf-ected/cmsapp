<?php

use Illuminate\Database\Seeder;

class VideoPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\video_page::class,10)->create();

    }
}
