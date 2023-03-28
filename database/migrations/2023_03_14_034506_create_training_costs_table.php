
        
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
                Schema::create('training_costs', function (Blueprint $table) {
                    $table->id();
                    $table->string('training_plan_id')->nullable();
                    $table->string('ket_biaya')->nullable();
                    $table->string('biaya')->nullable();
                    $table->string('kategori_biaya')->nullable();

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
                Schema::dropIfExists('training_costs');
            }
        };
