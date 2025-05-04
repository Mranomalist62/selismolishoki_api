<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jenis_Kerusakans', function (Blueprint $table) {
            $table->id(); // creates an UNSIGNED BIGINT with AUTO_INCREMENT
            $table->string('nama', 255); // creates a VARCHAR(255)
            $table->timestamps(); // creates 'created_at' and 'updated_at' TIMESTAMP columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_kerusakans');
    }
};
