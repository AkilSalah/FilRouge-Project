<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Theme::factory()->count(3)->create();
    }
}
