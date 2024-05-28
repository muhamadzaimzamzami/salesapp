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
        Schema::create('t_sales_merch', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users');
            $table->integer('id_store');
            $table->integer('id_product');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->integer('status');
            $table->text('description');
            $table->text('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_merch');
    }
};
