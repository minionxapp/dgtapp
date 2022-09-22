
        
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
                Schema::create('projects', function (Blueprint $table) {
                    $table->id();
                    $table->string('nama')->nullable();
                    $table->string('jenis')->nullable();
                    $table->string('divisi_kode')->nullable();
                    $table->string('departemen_kode')->nullable();
                    $table->string('unit_req')->nullable();
                    $table->string('pic_req')->nullable();
                    $table->string('keterangan')->nullable();
                    $table->string('file01')->nullable();
                    $table->string('file02')->nullable();
                    $table->string('gambar')->nullable();
                    $table->string('start_plan')->nullable();
                    $table->string('end_plan')->nullable();
                    $table->string('divisi_assignto')->nullable();
                    $table->string('dept_assignto')->nullable();
                    $table->string('file_desc01')->nullable();
                    $table->string('file_uri01')->nullable();
                    $table->string('file_desc02')->nullable();
                    $table->string('file_uri02')->nullable();
                    $table->string('pic_assignto')->nullable();
                    $table->string('kode')->nullable();

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
                Schema::dropIfExists('projects');
            }
        };
