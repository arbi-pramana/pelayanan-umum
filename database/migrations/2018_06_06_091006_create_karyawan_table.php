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
class CreateKaryawanTable extends Migration
{

    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments("id");
            $table->string("nama", 120);
            $table->string("nama_tanpa_gelar", 120);
            $table->string("no_induk", 120);
            $table->string("nid", 120);
            $table->string("jabatan", 120);
            $table->string("bidang", 120);
            $table->string("sub_bidang", 120);
            $table->string("grade", 120);
            $table->string("jenis_kelamin", 120);
            $table->string("pendidikan", 120);
            $table->string("universitas", 120);
            $table->string("password", 60);
            $table->string("id_atasan", 120);
            $table->string("id_supervisor", 120);
            $table->string("id_manajer", 120);
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
        Schema::dropIfExists('karyawan');
    }

}
