<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\factories;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Company::factory()->count(30)->create();
      // factory(App\Model\Company::class, 30)->create();
    }
}
