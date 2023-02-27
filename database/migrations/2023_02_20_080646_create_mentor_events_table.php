
        
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
                Schema::create('mentor_events', function (Blueprint $table) {
                    $table->id();
                    $table->string('no_surtug')->nullable();
                    $table->string('nama_event')->nullable();
                    $table->string('ket')->nullable();
                    $table->string('tgl_mulai')->nullable();
                    $table->string('tgl_selesai')->nullable();

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
                Schema::dropIfExists('mentor_events');
            }
        };
