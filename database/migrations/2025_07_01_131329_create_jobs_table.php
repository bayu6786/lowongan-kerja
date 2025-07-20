<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('job_listings', function (Blueprint $table) {
        $table->id();
        $table->string('company_name');
        $table->string('position');
        $table->string('location');
        $table->text('job_description');
        $table->text('qualification');
        $table->date('expiration_date');
        $table->string('contact');
        $table->string('salary');
        $table->string('job_type');
        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
