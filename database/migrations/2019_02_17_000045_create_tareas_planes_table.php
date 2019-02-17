<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasPlanesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tareas_planes';

    /**
     * Run the migrations.
     * @table tareas_planes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idplan');
            $table->integer('idact')->unsigned();
            $table->integer('idplanest')->unsigned();
            $table->string('plan_nombre', 45)->nullable();

            $table->index(["idact"], 'fk_tareas_planes_actividades1_idx');

            $table->index(["idplanest"], 'fk_tareas_planes_planes_estados1_idx');


            $table->foreign('idact', 'fk_tareas_planes_actividades1_idx')
                ->references('idact')->on('actividades')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idplanest', 'fk_tareas_planes_planes_estados1_idx')
                ->references('idplanest')->on('planes_estados')
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
