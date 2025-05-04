<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('riwayats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idReservasi');
            $table->string('status', 255);
            $table->timestamps();

            $table->foreign('idReservasi')->references('id')->on('reservasis')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
