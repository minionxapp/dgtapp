
        
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
                Schema::create('training_plansxx', function (Blueprint $table) {
                    $table->id();
                    $table->string('nama_training')->nullable();
                    $table->string('kategori')->nullable();
                    $table->string('keterangan')->nullable();
                    $table->string('pelaksanaan')->nullable();
                    $table->string('jml_peserta')->nullable();
                    $table->string('lokasi')->nullable();
                    $table->string('biaya')->nullable();
                    $table->string('jml_kelas')->nullable();
                    $table->string('durasi')->nullable();
                    $table->string('tgl_mulai')->nullable();
                    $table->string('tgl_selesai')->nullable();
                    $table->string('unit_usul')->nullable();
                    $table->string('pic_akademi')->nullable();

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
                Schema::dropIfExists('training_plans');
            }
        };
