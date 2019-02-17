<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrmProcedimientoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'frm_procedimiento';

    /**
     * Run the migrations.
     * @table frm_procedimiento
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idproced');
            $table->integer('idgesdoc')->unsigned();
            $table->string('proced_obs1_json')->nullable();
            $table->string('proced_obs2_json')->nullable();

            $table->index(["idgesdoc"], 'fk_frm_procedimiento_auditoria_documental1_idx');


            $table->foreign('idgesdoc', 'fk_frm_procedimiento_auditoria_documental1_idx')
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
