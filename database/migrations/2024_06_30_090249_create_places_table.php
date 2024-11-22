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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('token')->nullable();
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->text('image')->nullable();
            $table->text('telephone')->nullable();
            $table->text('lat')->nullable();
            $table->text('lng')->nullable();
            $table->text('category')->nullable();
            $table->text('website')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
