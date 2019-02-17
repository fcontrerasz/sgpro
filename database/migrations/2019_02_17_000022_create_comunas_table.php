<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'comunas';

    /**
     * Run the migrations.
     * @table comunas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idcomuna');
            $table->string('comu_nombre', 45)->nullable();
            $table->integer('region_idregion')->unsigned();

            $table->index(["region_idregion"], 'fk_comunas_region1_idx');


            $table->foreign('region_idregion', 'fk_comunas_region1_idx')
                ->references('idregion')->on('region')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
