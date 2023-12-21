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
        // Schema::create('mahasiswas', function (Blueprint $table) {
        //     $table->uuid('id');
        //     $table-> primary('id');
        //     $table->char('npm',10);
        //     $table->string('nama',50);
        //     $table->string('tempat_lahir',50);
        //     $table->date('tanggal_lahir');
        //     $table->string('foto',50);
        //     $table->uuid('prodis_id');
        //     $table->foreign('prodis_id')->references('id')->on('prodis')->restrictOnDelete()
        //     ->restrictonUpdate();
        //     $table->timestamps();
        // });
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->enum('jk', ['L', 'P'])->default('L')->after('tanggal_lahir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};