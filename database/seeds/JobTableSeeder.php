<?php

use Illuminate\Database\Seeder;


class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Job::class,20)->create();
    }
}
