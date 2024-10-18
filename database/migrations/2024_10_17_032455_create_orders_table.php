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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->name('order_id');
            $table->string('transaction_no', 20);
            $table->string('customer_name', 200);
            $table->tinyInteger('order_status');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE orders AUTO_INCREMENT 2001');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
