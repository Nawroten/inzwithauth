<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson', function (Blueprint $table) {
            $table->increments('id_lesson');

            $table->integer('nr_cw_z1')->default('0');
            $table->integer('oc1_z1')->defaut('0');
            $table->integer('oc2_z1')->defaut('0');
            $table->integer('oc3_z1')->defaut('0');
            $table->string('date_z1',10)->default('01-01-2020');

            $table->UnsignedBigInteger('id_studenta');

            $table->timestamps();
        });
        for($i=1; $i<=15; $i++){
            for($j=1; $j<=15; $j++){
        DB::table('lesson')->insert(
            array(
                'id_studenta'   => $i,
                'nr_cw_z1' => '0',
                'oc1_z1'    => '0',
                'oc2_z1'    => '0',
                'oc3_z1'    => '0',
                'date_z1'    => '01-01-2020',
            )
            );
        }
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson');
    }
}
