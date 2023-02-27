
        
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
                Schema::create('training_licenses', function (Blueprint $table) {
                    $table->id();
                    $table->string('nama_license')->nullable();
                    $table->string('keterangan')->nullable();
                    $table->string('jml')->nullable();
                    $table->string('tgl_start')->nullable();
                    $table->string('tgl_end')->nullable();
                    $table->string('pic')->nullable();
                    $table->string('status')->nullable();
                    $table->string('id_panjang')->nullable();

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
                Schema::dropIfExists('training_licenses');
            }
        };
