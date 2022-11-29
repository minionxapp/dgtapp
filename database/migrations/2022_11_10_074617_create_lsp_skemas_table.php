
        
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
                Schema::create('lsp_skemas', function (Blueprint $table) {
                    $table->id();
                    $table->string('kode_skema')->nullable();
                    $table->string('nama_skema')->nullable();
                    $table->string('jenis_skema')->nullable();
                    $table->string('jumlah_unit')->nullable();
                    $table->string('sektor')->nullable();
                    $table->string('bidang')->nullable();
                    $table->string('kode_unit')->nullable();
                    $table->string('unit_kompetensi')->nullable();

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
                Schema::dropIfExists('lsp_skemas');
            }
        };
