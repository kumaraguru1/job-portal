<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->integer('experience');
            $table->integer('notice_period');
            $table->text('skills');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->string('resume')->nullable();
            $table->string('photo')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_seekers');
    }
};
