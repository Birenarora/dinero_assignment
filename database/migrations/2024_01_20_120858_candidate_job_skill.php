<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $table = 'candidate_job_skill';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidate_job_skill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_profile_id', false);
            $table->foreign('candidate_profile_id')->references('id')->on('candidate_profile')->onDelete('cascade');
            $table->string('skills');
            $table->string('training_or_certifications')->nullable();
            $table->string('reffered_through');
            $table->string('reffered_through_others')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidate_job_skill', function (Blueprint $table) {
            $table->dropForeign(['candidate_profile_id']);
            $table->dropColumn('candidate_profile_id');
        });
        Schema::dropIfExists('candidate_job_skill');
    }
};
