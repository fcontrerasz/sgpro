<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionContratosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'asig_contratos';

    /**
     * Run the migrations.
     * @table asignacion_contratos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idasigcon');
            $table->integer('idadmincontrato')->unsigned();
            $table->integer('iddireccion')->unsigned();
            $table->integer('idgerencia')->unsigned();
            $table->integer('idsubgerencia')->unsigned();
            $table->integer('idarea')->unsigned();
            $table->integer('idcontrato')->unsigned();
            $table->integer('idempresas')->unsigned();
            $table->integer('idtipo_cont')->unsigned();
            $table->integer('idforcon')->unsigned();
            $table->date('asigcon_inicio')->nullable();
            $table->date('asigcon_termino')->nullable();
            $table->tinyInteger('asigcon_activo')->nullable();

            $table->index(["idtipo_cont"], 'fk_asignacion_contratos_tipo_contrato1_idx');

            $table->index(["idsubgerencia"], 'fk_asignacion_contratos_subgerencia1_idx');

            $table->index(["idgerencia"], 'fk_asignacion_contratos_gerencia1_idx');

            $table->index(["idempresas"], 'fk_contratos_has_empresas_empresas2_idx');

            $table->index(["iddireccion"], 'fk_asignacion_contratos_direccion1_idx');

            $table->index(["idforcon"], 'fk_asignacion_contratos_formato_contrato1_idx');

            $table->index(["idadmincontrato"], 'fk_asignacion_contratos_usuarios1_idx');

            $table->index(["idcontrato"], 'fk_contratos_has_empresas_contratos1_idx');

            $table->index(["idarea"], 'fk_asignacion_contratos_area1_idx');


            $table->foreign('idcontrato', 'fk_contratos_has_empresas_contratos1_idx')
                ->references('idcontrato')->on('contratos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idempresas', 'fk_contratos_has_empresas_empresas2_idx')
                ->references('idempresas')->on('contratistas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idadmincontrato', 'fk_asignacion_contratos_usuarios1_idx')
                ->references('idusuario')->on('usuarios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idtipo_cont', 'fk_asignacion_contratos_tipo_contrato1_idx')
                ->references('idtipo_cont')->on('tipo_contrato')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idarea', 'fk_asignacion_contratos_area1_idx')
                ->references('idarea')->on('area')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idsubgerencia', 'fk_asignacion_contratos_subgerencia1_idx')
                ->references('idsubgerencia')->on('subgerencia')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idgerencia', 'fk_asignacion_contratos_gerencia1_idx')
                ->references('idgerencia')->on('gerencia')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('iddireccion', 'fk_asignacion_contratos_direccion1_idx')
                ->references('iddireccion')->on('direccion')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idforcon', 'fk_asignacion_contratos_formato_contrato1_idx')
                ->references('idforcon')->on('formato_contrato')
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
