<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CandidateJobSkill;
use App\Models\CandidateProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        CandidateProfile::factory()->count(50)->create()->each(function ($cp) {
            CandidateJobSkill::create([
                'candidate_profile_id' => $cp->id,
                'skills' => fake()->jobTitle(),
                'training_or_certifications' => fake()->catchPhrase(),
                'reffered_through' => fake()->company(),
                'reffered_through_others' => fake()->text(),
            ]);
        });
    }
}
