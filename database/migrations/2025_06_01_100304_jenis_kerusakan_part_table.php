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
        Schema::create('jenis_kerusakan_parts', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('jenis_kerusakan_id');
            $table->unsignedBigInteger('part_id');
            $table->timestamps();
            $table->foreign('jenis_kerusakan_id')
                ->references('id')
                ->on('jenis_Kerusakans')
                ->onDelete('cascade');

            $table->foreign('part_id')
            ->references('id')
            ->on('parts')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_kerusakan_parts');
    }
};
