<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsigRepreLegalTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'asig_repre_legal';

    /**
     * Run the migrations.
     * @table asig_repre_legal
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idempresas');
            $table->integer('idrepleg')->unsigned();

            $table->index(["idempresas"], 'fk_empresas_has_representante_legal_empresas1_idx');

            $table->index(["idrepleg"], 'fk_empresas_has_representante_legal_representante_legal1_idx');


            $table->foreign('idempresas', 'fk_empresas_has_representante_legal_empresas1_idx')
                ->references('idempresas')->on('contratistas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idrepleg', 'fk_empresas_has_representante_legal_representante_legal1_idx')
                ->references('idrepleg')->on('representante_legal')
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
