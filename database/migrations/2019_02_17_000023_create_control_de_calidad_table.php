<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlDeCalidadTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'control_de_calidad';

    /**
     * Run the migrations.
     * @table control_de_calidad
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idccal');
            $table->string('ccal_codigo', 45)->nullable();
            $table->string('ccal_preguntas', 45)->nullable();
            $table->string('ccal_respuestas', 45)->nullable();
            $table->integer('documentos_requeridos_iddocu')->unsigned();

            $table->index(["documentos_requeridos_iddocu"], 'fk_control_de_calidad_documentos_requeridos1_idx');


            $table->foreign('documentos_requeridos_iddocu', 'fk_control_de_calidad_documentos_requeridos1_idx')
                ->references('iddocu')->on('documentos_requeridos')
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
