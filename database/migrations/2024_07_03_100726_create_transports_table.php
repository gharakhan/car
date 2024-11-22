<?php

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
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained();
            $table->string('token');
            $table->string('mobile')->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('trim')->nullable();
            $table->string('time')->nullable();
            $table->string('year')->nullable();
            $table->string('location')->nullable();
            $table->string('mileage')->nullable();
            $table->string('transmission')->nullable();
            $table->string('fuel')->nullable();
            $table->string('color')->nullable();
            $table->string('body_color')->nullable();
            $table->string('inside_color')->nullable();
            $table->string('body_status')->nullable();
            $table->string('body_type')->nullable();
            $table->text('description')->nullable();
            $table->string('province')->nullable();
            $table->string('price')->nullable();
            $table->text('images')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('transports');
    }
};
