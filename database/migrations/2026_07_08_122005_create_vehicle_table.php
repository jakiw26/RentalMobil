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
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_type_id')
                ->references('id')
                ->on('vehicle_type')
                ->cascadeOnDelete();


            $table->string('brand');

            $table->string('model');

            $table->string('plate_number')
                ->unique();


            $table->year('year');


            $table->enum('status', [
                'available',
                'rented',
                'maintenance'
            ])
                ->default('available');


            $table->integer('price_per_day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle');
    }
};
