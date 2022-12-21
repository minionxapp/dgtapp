
        
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
                Schema::create('vm_perusahaans', function (Blueprint $table) {
                    $table->id();
                    $table->string('nama')->nullable();
                    $table->string('alamat')->nullable();
                    $table->string('telp')->nullable();
                    $table->string('email')->nullable();
                    $table->string('ttd_spk')->nullable();
                    $table->string('jabat_ttd')->nullable();
                    $table->string('negosiator')->nullable();
                    $table->string('jabat_negosiator')->nullable();
                    $table->string('telp_negosiator')->nullable();
                    $table->string('sts_padi')->nullable();
                    $table->string('sts_drm')->nullable();
                    $table->string('sts_smap')->nullable();
                    $table->string('sts_pajak')->nullable();
                    $table->string('link_file')->nullable();
                    $table->string('rating')->nullable();

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
                Schema::dropIfExists('vm_perusahaans');
            }
        };
