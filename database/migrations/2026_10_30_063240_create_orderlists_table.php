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
        Schema::create('orderLists', function (Blueprint $table) {
            $table->id();
            $table->decimal(column: 'amount', total: 15, places: 3);
            $table->decimal(column: 'price', total: 15, places: 3);
            $table->foreignId(column: 'id_order')->constrained()->onDelete( 'cascade');
            $table->foreignId(column: 'id_product')->constrained()->onDelete( 'cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderlists');
    }
};
