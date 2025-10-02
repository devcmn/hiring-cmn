<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs_list', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location')->nullable();
            $table->enum('job_type', ['Full-time', 'Part-time', 'Contract', 'Internship'])->default('Full-time');
            $table->decimal('salary', 12, 2)->nullable();
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();
            $table->text('benefits')->nullable();
            $table->foreignId('posted_by')->constrained('users')->onDelete('cascade'); // recruiter/admin
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_jobs');
    }
};
