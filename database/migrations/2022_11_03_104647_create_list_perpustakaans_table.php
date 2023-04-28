<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_perpustakaans', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('nama');
            $table->enum('kelas', ['X SIJA 1', 'X SIJA 2', 'XI SIJA 1', 'XI SIJA 2', 'XII SIJA 1', 'XII SIJA 2']);
            $table->string('buku_dipinjam');
            $table->enum('nama_penjaga', ['Andika Firmansyah', 'Ayupri Anggita', 'Irvan Maulana', 'leo Marselio', 'Novarita Afrela', 'Printa Imelda', 'Riska Agustina']);
            $table->string('status');
            $table->string('tanggal_dikembalikan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_perpustakaans');
    }
};
