<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('req_jadwals', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key

            $table->unsignedBigInteger('idReservasi')->nullable(); // FK to reservasis table

            $table->date('tanggal');         // Schedule date
            $table->time('waktuMulai');      // Start time
            $table->time('waktuSelesai');    // End time

            $table->timestamps(); // created_at and updated_at

            // Add foreign key constraint (optional but recommended)
            $table->foreign('idReservasi')
                    ->references('id')
                    ->on('reservasis')
                    ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('req_jadwal');
    }
};