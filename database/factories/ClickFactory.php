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
        $timestamps = $this->faker->date;
        return [
            'campaign_id'=>rand(1,20),
            'link_id'=>rand(1,20),
            'user_ip'=>$this->faker->ipv4,
            'created_at'=>$timestamps,
            'updated_at'=>$timestamps
        ];
    }
}
