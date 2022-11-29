
        
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
                Schema::create('pegawais', function (Blueprint $table) {
                    $table->id();
                    $table->string('nip')->nullable();
                    $table->string('nip_lengkap')->nullable();
                    $table->string('nama_pegawai')->nullable();
                    $table->string('jenis_kelamin')->nullable();
                    $table->string('status_aktif')->nullable();
                    $table->string('kode_unit')->nullable();
                    $table->string('nama_unit')->nullable();
                    $table->string('unit_tk_1')->nullable();
                    $table->string('unit_tk_2')->nullable();
                    $table->string('unit_tk_3')->nullable();
                    $table->string('jenis_kantor')->nullable();

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
                Schema::dropIfExists('pegawais');
            }
        };
