
        
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
        Schema::create('training_notes', function (Blueprint $table) {
            $table->id();                    
       $table->string('nip')->nullable();
$table->string('tahun')->nullable();
$table->string('event')->nullable();
$table->string('date_start')->nullable();
$table->string('date_end')->nullable();
$table->string('note')->nullable();
$table->string('nama_pegawai')->nullable();
$table->string('pilihan')->nullable();

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
        Schema::dropIfExists('training_notes');
    }
};
        


