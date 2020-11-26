<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanySeeder::class);
        $this->call(JobsSeeder::class);
        $this->call(UserSeeder::class);

        $categories=[
            'Government','NGO','Banking','software','Networking','2nd optionb'
        ];
        foreach ($categories as $category){
            \App\Models\Category::create(['name'=>$category]);
        }
    }
}
