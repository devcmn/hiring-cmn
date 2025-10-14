<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('education_and_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_application_id')->constrained()->cascadeOnDelete();

            $table->enum('type', ['education', 'seminar', 'organization']);
            $table->string('name'); // school / seminar / organization name
            $table->string('major_or_topic')->nullable(); // study major or seminar topic
            $table->string('position')->nullable(); // only for organization
            $table->year('start_year')->nullable();
            $table->year('end_year')->nullable();
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education_and_activities');
    }
};
