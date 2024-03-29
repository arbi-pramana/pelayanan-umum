<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Generated by LaraSpell
 * 
 * @author  Ditama Digital <info@ditamadigtal.co.id>
 * @created Wed, 06 Jun 2018 09:10:06 +0000
 */
class CreateAnggaranSumberDanaTable extends Migration
{

    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran_sumber_dana', function (Blueprint $table) {
            $table->increments("id");
            $table->string("id_sumber_dana", 255);
            $table->integer("anggaran");
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
        Schema::dropIfExists('anggaran_sumber_dana');
    }

}
