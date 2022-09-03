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
        // 'nama','tipedata','null_','key_','default_','create_by','update_by','','','','','',''
        Schema::create('koloms', function (Blueprint $table) {
            $table->id();
            $table->string("nama")->nullable();
            $table->string("tipedata")->nullable();
            $table->string("null_")->nullable();
            $table->string("key_")->nullable();
            $table->string("default_")->nullable();
            // $table->string("")->nullable();
            // $table->string("")->nullable();
            // $table->string("")->nullable();
            // $table->string("")->nullable();
            $table->string("nama_tabel")->nullable();
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
        Schema::dropIfExists('koloms');
    }
};
