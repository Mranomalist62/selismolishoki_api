<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('servis', 255);
            $table->string('namaLengkap', 255);
            $table->text('alamatLengkap');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('noTelp', 255);
            $table->unsignedBigInteger('idJenisKerusakan');
            $table->text('deskripsi');
            $table->string('gambar', 255)->nullable();
            $table->string('video', 255)->nullable();
            $table->string('noResi', 255)->nullable();
            $table->string('status', 255)->default('Menunggu Konfirmasi');
            $table->timestamps();

            // Foreign key constraint (optional)
            $table->foreign('idJenisKerusakan')->references('id')->on('jenis_kerusakans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};