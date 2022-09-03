
        
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
                Schema::create('files', function (Blueprint $table) {
                    $table->id();
                    $table->string('file_group');
                    $table->string('file_id');
                    $table->string('file_real_name');
                    $table->string('file_name');
                    $table->string('file_path');
                    $table->string('file_size');
                    $table->string('file_type');

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
                Schema::dropIfExists('files');
            }
        };
