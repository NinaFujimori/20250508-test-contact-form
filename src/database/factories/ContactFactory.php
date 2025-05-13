<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'last_name' =>$this->faker->lastName,
            'first_name' =>$this->faker->firstName,
            'gender'=>$this->faker->randomElement(['男性', '女性', 'その他']),
            'email'=>$this->faker->safeEmail(),
            'tel_first'=>$this->faker->numberBetween(100,999),
            'tel_second'=>$this->faker->numberBetween(1000,9999),
            'tel_third'=>$this->faker->numberBetween(1000,9999),
            'address'=>$this->faker->address,
            'building'=>$this->faker->secondaryAddress,
            'category_id' => optional(Category::inRandomOrder()->first())->id ?? 1,
            'detail'=>$this->faker->sentence()
        ];
    }
}
