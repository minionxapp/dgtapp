
        
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
                Schema::create('lsp_sertifikats', function (Blueprint $table) {
                    $table->id();
                    $table->string('no')->nullable();
                    $table->string('noreg1')->nullable();
                    $table->string('noreg2')->nullable();
                    $table->string('noreg3')->nullable();
                    $table->string('nama')->nullable();
                    $table->string('noser1')->nullable();
                    $table->string('noser2')->nullable();
                    $table->string('noser3')->nullable();
                    $table->string('noser4')->nullable();
                    $table->string('noser5')->nullable();
                    $table->string('no_blanko')->nullable();
                    $table->string('email')->nullable();
                    $table->string('hp')->nullable();
                    $table->string('kode_skema')->nullable();
                    $table->string('nama_skema')->nullable();
                    $table->string('provinsi')->nullable();
                    $table->string('th_lapor')->nullable();
                    $table->string('no_sertifikat')->nullable();
                    $table->string('no_register')->nullable();
                    $table->string('tipe')->nullable();

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
                Schema::dropIfExists('lsp_sertifikats');
            }
        };
