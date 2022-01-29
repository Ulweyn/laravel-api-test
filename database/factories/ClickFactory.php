<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClickFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'campaign_id'=>rand(1,20),
            'link_id'=>rand(1,20),
            'user_ip'=>$this->faker->ipv4,
            'created_at'=>$this->faker->date,
            'updated_at'=>$this->faker->date
        ];
    }
}
