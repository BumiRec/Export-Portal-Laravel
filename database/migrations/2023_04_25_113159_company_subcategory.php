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
        Schema::create('company_subcategory', function (Blueprint $table) {
            $table->id("id");
            $table->string('category');
            $table->unsignedBigInteger("category_id");
            $table->foreign('category_id')->references('id')->on('company_category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop($tableNames['company_subcategory']);
    }
};
