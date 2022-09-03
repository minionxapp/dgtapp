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
        Schema::create('tasks', function (Blueprint $table) {
            // "kode",nm_project,descripsi,divisi_kode,departemen_kode,pic,mulai,selesai,status
            $table->id();
            $table->string("kode")->nullable();
            $table->string("nm_project");
            $table->string("descripsi")->nullable();
            $table->string("divisi_kode")->nullable();
            $table->string("departemen_kode")->nullable();
            $table->string("pic")->nullable();
            $table->date("mulai")->nullable();
            $table->date("selesai")->nullable();
            $table->string("status")->nullable();
            $table->string("jenis")->nullable();
            $table->string('create_by')->nullable();
            $table->string('update_by')->nullable();
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
        Schema::dropIfExists('tasks');
    }
};
