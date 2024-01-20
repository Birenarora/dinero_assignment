<?php

namespace Database\Factories;

use App\Models\CandidateProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CandidateJobSkill>
 */
class CandidateJobSkillFactory extends Factory
{
    protected $table = 'candidate_job_skill';
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'candidate_profile_id' => CandidateProfile::factory(),
            'skills' => $this->faker->jobTitle(),
            'training_or_certifications' => $this->faker->catchPhrase(),
            'reffered_through' => $this->faker->company(),
            'reffered_through_others' => $this->faker->text(),
        ];
    }
}
