<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoTrabajadorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tipo_trabajador';

    /**
     * Run the migrations.
     * @table tipo_trabajador
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idtipo_trabajador');
            $table->string('tipot_nombre', 45)->nullable()->comment('ejemplo: TRABAJADOR, SUBCONTRATISTA, SUPERVISOR

si es trabajador pertenece a la empresa que tiene el contrato, sino pertenece a una subcontratación
');
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
