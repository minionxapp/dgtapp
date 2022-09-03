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
        // {"nama","kode","desc","aktif","urut","create_by","update_by"}
        Schema::create('params', function (Blueprint $table) {
            $table->id();
            $table->string("nama")->nullable();
            $table->string("kode")->nullable();
            $table->string("desc")->nullable();
            $table->string("aktif")->nullable();
            $table->integer("urut")->nullable();
            // $table->string("")->nullable();
            // $table->string("")->nullable();
            // $table->string("")->nullable();


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
        Schema::dropIfExists('params');
    }
};
