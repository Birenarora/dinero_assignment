<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateJobSkill extends Model
{
    use HasFactory;

    protected $table = 'candidate_job_skill';

    protected $fillable = ['candidate_profile_id', 'skills', 'training_or_certifications', 'reffered_through', 'reffered_through_others'];

    public function candidateProfile() {
        return $this->belongsTo(CandidateProfile::class);
    }
}
