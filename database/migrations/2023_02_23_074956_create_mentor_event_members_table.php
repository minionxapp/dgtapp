
        
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
                Schema::create('mentor_event_members', function (Blueprint $table) {
                    $table->id();
                    $table->string('event_id')->nullable();
                    $table->string('nik_mentor')->nullable();
                    $table->string('nik_mente')->nullable();
                    $table->string('ket')->nullable();

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
                Schema::dropIfExists('mentor_event_members');
            }
        };
