<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditoriasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'auditorias';

    /**
     * Run the migrations.
     * @table auditorias
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idaudit');
            $table->integer('idusuario')->unsigned();
            $table->integer('idgesdoc')->unsigned();
            $table->integer('idccal')->unsigned();
            $table->text('audit_respuestas')->nullable();
            $table->date('audit_fechacreacion')->nullable();
            $table->date('audit_fechaact')->nullable();
            $table->integer('audti_ponderacion')->nullable();

            $table->index(["idgesdoc"], 'fk_auditorias_gestion_documental1_idx');

            $table->index(["idccal"], 'fk_auditorias_control_de_calidad1_idx');

            $table->index(["idusuario"], 'fk_auditorias_usuarios1_idx');


            $table->foreign('idusuario', 'fk_auditorias_usuarios1_idx')
                ->references('idusuario')->on('usuarios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idgesdoc', 'fk_auditorias_gestion_documental1_idx')
                ->references('idgesdoc')->on('gestion_documental')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idccal', 'fk_auditorias_control_de_calidad1_idx')
                ->references('idccal')->on('control_de_calidad')
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
