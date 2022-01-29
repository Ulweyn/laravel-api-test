<?php

namespace Database\Seeders;

use App\Models\Click;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Click::factory(1000)->create();
    }
}
