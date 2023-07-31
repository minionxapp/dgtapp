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
                Schema::create('training_intrainers', function (Blueprint $table) {
                    $table->id();
                    $table->string('nip')->nullable();
                    $table->string('nama_trainer')->nullable();
                    $table->string('training_plan_id')->nullable();
                    $table->string('materi')->nullable();
                    $table->string('catatan')->nullable();
                    $table->string('internal')->nullable();

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
                Schema::dropIfExists('training_intrainers');
            }
        };
