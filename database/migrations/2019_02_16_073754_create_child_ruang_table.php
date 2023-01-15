<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Generated by LaraSpell
 * 
 * @author  Ditama Digital <info@ditamadigtal.co.id>
 * @created Sat, 16 Feb 2019 07:37:54 +0000
 */
class CreateChildRuangTable extends Migration
{

    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('child_ruang', function (Blueprint $table) {
            $table->increments("id");
            $table->string("id_parent_ruang", 100);
            $table->string("deskripsi", 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_ruang');
    }

}
