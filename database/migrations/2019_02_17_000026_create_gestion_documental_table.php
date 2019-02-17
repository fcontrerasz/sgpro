<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestionDocumentalTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'gestion_documental';

    /**
     * Run the migrations.
     * @table gestion_documental
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idgesdoc');
            $table->integer('iddocu')->unsigned();
            $table->integer('idestgesd')->unsigned();
            $table->integer('idempresas')->unsigned();
            $table->string('gesdoc_nombre', 45)->nullable();
            $table->string('gesdoc_ano', 45)->nullable();
            $table->string('gesdoc_mes', 45)->nullable();

            $table->index(["idestgesd"], 'fk_gestion_documental_estado_gestiondocum1_idx');

            $table->index(["idempresas"], 'fk_gestion_documental_contratistas1_idx');

            $table->index(["iddocu"], 'fk_auditoria_documental_documentos_requeridos1_idx');


            $table->foreign('iddocu', 'fk_auditoria_documental_documentos_requeridos1_idx')
                ->references('iddocu')->on('documentos_requeridos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idestgesd', 'fk_gestion_documental_estado_gestiondocum1_idx')
                ->references('idestgesd')->on('estado_gestiondocum')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idempresas', 'fk_gestion_documental_contratistas1_idx')
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
