<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletasGarantiaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'boletas_garantia';

    /**
     * Run the migrations.
     * @table boletas_garantia
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idbgara');
            $table->string('bgara_nombre', 45)->nullable();
            $table->integer('idempresas')->unsigned();

            $table->index(["idempresas"], 'fk_boletas_garantia_empresas1_idx');


            $table->foreign('idempresas', 'fk_boletas_garantia_empresas1_idx')
                ->references('idempresas')->on('contratistas')
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
