<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidenciasArchivosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evidencias_archivos';

    /**
     * Run the migrations.
     * @table evidencias_archivos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idevarch');
            $table->integer('idgesdoc')->unsigned();
            $table->string('evarch_nombre', 45)->nullable();
            $table->string('evarch_tipo', 45)->nullable();
            $table->binary('evarch_archivo')->nullable();
            $table->string('evarch_peso', 45)->nullable();
            $table->date('evarch_fechacreacion')->nullable();

            $table->index(["idgesdoc"], 'fk_evidencias_archivos_auditoria_documental1_idx');


            $table->foreign('idgesdoc', 'fk_evidencias_archivos_auditoria_documental1_idx')
                ->references('idgesdoc')->on('gestion_documental')
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
