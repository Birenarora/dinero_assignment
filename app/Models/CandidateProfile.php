<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    use HasFactory;

    protected $table = 'candidate_profile';

    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'mobile_number', 'email_address', 'address_line1', 'address_line2', 'city', 'state', 'pincode', 'resume_path'];

    public function candidateJobSkill() {
        return $this->hasOne(CandidateJobSkill::class);
    }
}
