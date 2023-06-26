<?php

namespace Database\Seeders;

use App\Models\Crisistypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrisistypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crisistypes::factory()->count(500)->create();
        
    }
}
