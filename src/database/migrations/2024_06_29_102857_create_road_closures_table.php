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
        Schema::create('road_closures', function (Blueprint $table) {
            $table->id();
            $table->string('given_to')->nullable();
            $table->string('work_location')->nullable();
            $table->string('work_road')->nullable();
            $table->integer('closure_type_id')->nullable();
            $table->string('closure_detail')->nullable();
            $table->datetime('closure_from');
            $table->datetime('closure_to')->nullable();
            $table->text('shape')->nullable();
            $table->json('shape_data');
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('road_closures');
    }
};
