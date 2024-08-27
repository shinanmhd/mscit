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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id')->unsigned();
            $table->schemalessAttributes('preferences');
            $table->integer('phone')->nullable();
            $table->text('bio')->nullable();
            $table->string('location')->nullable();

            $table->integer('country_id')->nullable();
            $table->string('atoll')->nullable();
            $table->integer('island_id')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
