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
        Schema::create('order_items', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('order_id');
                $table->unsignedBigInteger('item_id');
                $table->integer('quantity');
                $table->float('unit_price', 7, 2);

                $table->foreign('order_id')
                    ->references('order_id')
                    ->on('orders')
                    ->onDelete('cascade');

                $table->foreign('item_id')
                    ->references('item_id')
                    ->on('items')
                    ->onDelete('cascade');   

                $table->timestamps();   
        });
        DB::statement('ALTER TABLE items AUTO_INCREMENT 3001');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
