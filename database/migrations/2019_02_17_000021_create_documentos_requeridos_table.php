<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosRequeridosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'documentos_requeridos';

    /**
     * Run the migrations.
     * @table documentos_requeridos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('iddocu');
            $table->integer('idtipodoc')->unsigned();
            $table->integer('idcladoc')->unsigned();
            $table->integer('idcatdoc')->unsigned();
            $table->string('docu_codigo', 45)->nullable();
            $table->string('docu_nombre', 45)->nullable();
            $table->tinyInteger('docu_critico')->nullable();
            $table->text('docu_observacion')->nullable();
            $table->string('docu_seguimiento', 45)->nullable();
            $table->string('docu_clasificacion', 45)->nullable()->comment('ejemplo: EVIDENCIA o FORMULARIO. Los de tipo Evidencia se deben adjuntar archivos, los de tipo formulario se deben completar en linea.
');

            $table->index(["idtipodoc"], 'fk_documentos_requeridos_tipo_documentos1_idx');

            $table->index(["idcladoc"], 'fk_documentos_requeridos_clase_documento1_idx');

            $table->index(["idcatdoc"], 'fk_documentos_requeridos_categoria_documentos1_idx');


            $table->foreign('idtipodoc', 'fk_documentos_requeridos_tipo_documentos1_idx')
                ->references('idtipodoc')->on('tipo_documentos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idcladoc', 'fk_documentos_requeridos_clase_documento1_idx')
                ->references('idcladoc')->on('clase_documento')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idcatdoc', 'fk_documentos_requeridos_categoria_documentos1_idx')
                ->references('idcatdoc')->on('categoria_documentos')
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
