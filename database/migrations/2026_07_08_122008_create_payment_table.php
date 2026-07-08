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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')
                ->references('id')
                ->on('rentals')
                ->cascadeOnDelete();


            $table->integer('amount');


            $table->enum('payment_method', [
                'cash',
                'transfer',
                'qris'
            ]);


            $table->date('payment_date');


            $table->enum('status', [
                'pending',
                'paid',
                'failed'
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
        Schema::dropIfExists('payment');
    }
};
