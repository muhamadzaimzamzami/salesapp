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
        Schema::create('m_product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('category');
            $table->integer('barcode');
            $table->integer('price_oncartoon');
            $table->integer('price_onpieces');
            $table->string('weight');
            $table->string('image');
            $table->integer('stock');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
