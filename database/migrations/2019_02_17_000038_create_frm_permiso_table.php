<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrmPermisoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'frm_permiso';

    /**
     * Run the migrations.
     * @table frm_permiso
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idpermiso');
            $table->integer('idgesdoc')->unsigned();
            $table->string('permiso_riesgos_json')->nullable();
            $table->string('permiso_equipo_json')->nullable();
            $table->string('permiso_tareas_json')->nullable();
            $table->string('permiso_seguridad_json')->nullable();
            $table->string('permiso_magnitud_json')->nullable();
            $table->string('permiso_trabajadores_json')->nullable();
            $table->string('permiso_vb_json')->nullable();

            $table->index(["idgesdoc"], 'fk_frm_permiso_auditoria_documental1_idx');


            $table->foreign('idgesdoc', 'fk_frm_permiso_auditoria_documental1_idx')
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
