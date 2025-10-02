<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // applicant
            $table->foreignId('job_id')->constrained('jobs_list')->onDelete('cascade'); // job applied
            $table->string('status')->default('pending'); // pending, accepted, rejected
            $table->timestamps();

            $table->unique(['user_id', 'job_id']); // prevent duplicate application
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
