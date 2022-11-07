
        
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
        Schema::create('jajals', function (Blueprint $table) {
            $table->id();                    
       $table->string('kode')->nullable();
$table->string('nama')->nullable();
$table->string('jumlah')->nullable();
$table->string('divisi')->nullable();
$table->string('mulai')->nullable();

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
        Schema::dropIfExists('jajals');
    }
};
        


