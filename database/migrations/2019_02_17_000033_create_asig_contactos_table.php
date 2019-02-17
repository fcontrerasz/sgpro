<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsigContactosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'asig_contactos';

    /**
     * Run the migrations.
     * @table asig_contactos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idempresas');
            $table->integer('idcontacto')->unsigned();
            $table->integer('idtipocontra')->unsigned();

            $table->index(["idtipocontra"], 'fk_asig_contactos_tipo_subcontratista1_idx');

            $table->index(["idempresas"], 'fk_empresas_has_contactos_empresas1_idx');

            $table->index(["idcontacto"], 'fk_empresas_has_contactos_contactos1_idx');


            $table->foreign('idempresas', 'fk_empresas_has_contactos_empresas1_idx')
                ->references('idempresas')->on('contratistas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idcontacto', 'fk_empresas_has_contactos_contactos1_idx')
                ->references('idcontacto')->on('contactos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idtipocontra', 'fk_asig_contactos_tipo_subcontratista1_idx')
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
