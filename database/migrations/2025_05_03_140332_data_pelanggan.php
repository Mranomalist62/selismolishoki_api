<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('data_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 50);
            $table->string('nama', 255);
            $table->string('noHP', 20);
            $table->text('alamat');
            $table->text('keluhan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_pelanggans');
    }
};