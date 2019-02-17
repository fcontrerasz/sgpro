<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrmObservacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'frm_observacion';

    /**
     * Run the migrations.
     * @table frm_observacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idfrm_obs');
            $table->integer('idact')->unsigned();
            $table->string('obs_pregunta_1', 45)->nullable();

            $table->index(["idact"], 'fk_frm_observacion_gestiones_operativas1_idx');


            $table->foreign('idact', 'fk_frm_observacion_gestiones_operativas1_idx')
                ->references('idact')->on('actividades')
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
