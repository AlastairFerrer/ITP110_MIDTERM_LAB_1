<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id()->name('item_id');
            $table->string('item_name', 500);
            $table->float('price', 7, 2);
            $table->string('quantity', 500);
            $table->tinyInteger('is_active');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE items AUTO_INCREMENT 1001');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
