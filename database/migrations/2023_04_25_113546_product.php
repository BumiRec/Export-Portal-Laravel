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
        Schema::create('product', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('description');
            $table->decimal('price', 50, 2);
            $table->integer('views')->nullable();
            $table->string('type');
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("subcategory_id");
            $table->unsignedBigInteger("company_id");
            $table->foreign('category_id')->references('id')->on('product_category');
            $table->foreign('subcategory_id')->references('id')->on('product_subcategory');
            $table->foreign('company_id')->references('id')->on('company')->default(1);
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
