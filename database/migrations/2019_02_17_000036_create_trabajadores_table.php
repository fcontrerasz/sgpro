<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'trabajadores';

    /**
     * Run the migrations.
     * @table trabajadores
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idtrabajadores');
            $table->string('trab_nombres', 45)->nullable();
            $table->string('trab_apellidos', 45)->nullable();
            $table->string('trab_rut', 10)->nullable();
            $table->string('trab_dv', 1)->nullable();
            $table->string('trab_sexo', 45)->nullable();
            $table->string('trab_mail_1', 45)->nullable();
            $table->string('trab_mail_2', 45)->nullable();
            $table->string('trab_fono_1', 45)->nullable();
            $table->string('trab_fono_2', 45)->nullable();
            $table->tinyInteger('trab_activo')->nullable();
            $table->tinyInteger('trab_es_subcontrato');
            $table->integer('idempresas')->unsigned();
            $table->integer('idtipo_trabajador')->unsigned();
            $table->integer('idcargos')->unsigned();
            $table->integer('idsubcontratistas')->unsigned();

            $table->index(["idcargos"], 'fk_trabajadores_cargos1_idx');

            $table->index(["idempresas"], 'fk_trabajadores_empresas1_idx');

            $table->index(["idtipo_trabajador"], 'fk_trabajadores_tipo_trabajador1_idx');

            $table->index(["idsubcontratistas"], 'fk_trabajadores_subcontratistas1_idx');


            $table->foreign('idempresas', 'fk_trabajadores_empresas1_idx')
                ->references('idempresas')->on('contratistas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idtipo_trabajador', 'fk_trabajadores_tipo_trabajador1_idx')
                ->references('idtipo_trabajador')->on('tipo_trabajador')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idcargos', 'fk_trabajadores_cargos1_idx')
                ->references('idcargos')->on('cargos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idsubcontratistas', 'fk_trabajadores_subcontratistas1_idx')
                ->references('idsubcontratistas')->on('subcontratistas')
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
