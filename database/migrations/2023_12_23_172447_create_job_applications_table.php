<?php

use App\Models\job;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(job::class)->constrained();
            $table->string('Full_Name')->nullable();
            $table->unsignedInteger('expected_salary');
            $table->unsignedInteger('Years_of_Experience');
            $table->string('Email_address');
            $table->string('Phone_number');
            $table->string('Resume')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
