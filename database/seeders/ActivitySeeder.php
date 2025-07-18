<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Participant;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::factory()->has(Participant::factory())->count(15)->create();
    }
}
