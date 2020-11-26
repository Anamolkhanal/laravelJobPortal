<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Jobs::factory()->count(30)->create();
    }
}
