<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'user_id'=>$this->faker->randomDigit,
        'company_id'=>$this->faker->randomDigit,
        'title'=>$this->faker->text,
        'roles'=>$this->faker->text,
        'description'=>$this->faker->word(30),
        'category_id'=>$this->faker->randomDigit,
        'position'=>$this->faker->jobTitle,
        'status'=>$this->faker->randomDigit,
        'type'=>'Full Time',
        'last_date'=>$this->faker->DateTime,
        'address'=>$this->faker->address,
        ];
    }
}
