<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('spouse_children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_application_id')->constrained()->cascadeOnDelete();

            $table->string('relation')->comment('spouse or child');
            $table->string('name');
            $table->date('birth_date')->nullable();
            $table->string('occupation')->nullable();
            $table->string('education')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spouse_children');
    }
};
