<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionTrabajadoresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'asig_trabajadores';

    /**
     * Run the migrations.
     * @table asignacion_trabajadores
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idasigtrab');
            $table->integer('idasigcon')->unsigned();
            $table->integer('idtrabajadores')->unsigned();
            $table->date('asigtrab_inicio')->nullable();
            $table->date('asigtrab_termino')->nullable();
            $table->tinyInteger('asigtrab_activo')->nullable();

            $table->index(["idtrabajadores"], 'fk_asignacion_contratos_has_trabajadores_trabajadores1_idx');

            $table->index(["idasigcon"], 'fk_asignacion_contratos_has_trabajadores_asignacion_contrat_idx');


            $table->foreign('idasigcon', 'fk_asignacion_contratos_has_trabajadores_asignacion_contrat_idx')
                ->references('idasigcon')->on('asig_contratos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idtrabajadores', 'fk_asignacion_contratos_has_trabajadores_trabajadores1_idx')
                ->references('idtrabajadores')->on('trabajadores')
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
