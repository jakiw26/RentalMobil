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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
                ->references('id')
                ->on('customer')
                ->cascadeOnDelete();


            $table->foreignId('vehicle_id')
                ->references('id')
                ->on('vehicle')
                ->cascadeOnDelete();


            $table->foreignId('driver_id')
                ->nullable()
                ->references('id')
                ->on('driver')
                ->nullOnDelete();


            $table->date('rent_date');


            $table->date('return_date')
                ->nullable();


            $table->integer('total_price')
                ->nullable();


            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
                'finished'
            ])
                ->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
