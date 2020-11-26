<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
  
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model =\App\Models\Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->randomDigit,
            'cname'=>$this->faker->company, 
            'address'=>$this->faker->address,
            'phone'=>$this->faker->randomDigit,
            'website'=>$this->faker->domainName,
            'logo'=>'avatar/apple.png',
            'cover_photo'=>'cover/banner.png',
            'slogan'=>'Learn-Earn and Grow',
            'description'=>$this->faker->word(250),
        ];
    }
}
