
        
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
                Schema::create('mentor_surtugs', function (Blueprint $table) {
                    $table->id();
                    $table->string('no_surtug')->nullable();
                    $table->string('uraian')->nullable();
                    $table->string('tgl_mulai')->nullable();
                    $table->string('tgl_selesai')->nullable();
                    $table->string('nama_dokumen')->nullable();
                    $table->string('link_dokumen')->nullable();

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
                Schema::dropIfExists('mentor_surtugs');
            }
        };
