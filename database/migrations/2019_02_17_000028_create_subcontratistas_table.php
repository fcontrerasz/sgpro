<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcontratistasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'subcontratistas';

    /**
     * Run the migrations.
     * @table subcontratistas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idsubcontratistas');
            $table->integer('idempresas')->unsigned();
            $table->integer('idtiposubc')->unsigned();
            $table->string('subc_nombre', 100)->nullable();
            $table->string('subc_rut', 10)->nullable();
            $table->string('subc_dv', 1)->nullable();
            $table->string('subc_giro', 45)->nullable();
            $table->string('subc_direccion_1', 45)->nullable();
            $table->string('subc_direccion_2', 45)->nullable();
            $table->string('subc_fono_1', 45)->nullable();
            $table->string('subc_fono_2', 45)->nullable();

            $table->index(["idtiposubc"], 'fk_subcontratistas_tipo_subcontratista1_idx');

            $table->index(["idempresas"], 'fk_subcontratistas_empresas1_idx');


            $table->foreign('idempresas', 'fk_subcontratistas_empresas1_idx')
                ->references('idempresas')->on('contratistas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idtiposubc', 'fk_subcontratistas_tipo_subcontratista1_idx')
                ->references('idtiposubc')->on('tipo_subcontratista')
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
