<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'actividades';

    /**
     * Run the migrations.
     * @table actividades
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idact');
            $table->integer('idesact')->unsigned();
            $table->integer('idtipact')->unsigned();
            $table->integer('idasigcon')->unsigned();
            $table->integer('iddireccion')->nullable()->unsigned();
            $table->integer('idgerencia')->nullable()->unsigned();
            $table->integer('idsubgerencia')->nullable()->unsigned();
            $table->integer('idarea')->nullable()->unsigned();
            $table->integer('idrecinto')->nullable()->unsigned();
            $table->integer('idinfra')->nullable()->unsigned();
            $table->date('act_fechacreacion')->nullable();
            $table->string('act_mes', 45)->nullable();
            $table->string('act_ano', 45)->nullable();
            $table->integer('act_activo')->nullable();
            $table->date('act_fechatermino')->nullable();
            $table->date('act_fechaplan')->nullable();

            $table->index(["idarea"], 'fk_actividades_area1_idx');

            $table->index(["idesact"], 'fk_actividades_estado_actividad1_idx');

            $table->index(["iddireccion"], 'fk_actividades_direccion1_idx');

            $table->index(["idrecinto"], 'fk_actividades_recinto1_idx');

            $table->index(["idgerencia"], 'fk_actividades_gerencia1_idx');

            $table->index(["idsubgerencia"], 'fk_actividades_subgerencia1_idx');

            $table->index(["idinfra"], 'fk_actividades_infraestructura1_idx');

            $table->index(["idasigcon"], 'fk_actividades_asignacion_contratos1_idx');

            $table->index(["idtipact"], 'fk_actividades_tipo_actividad1_idx');


            $table->foreign('idtipact', 'fk_actividades_tipo_actividad1_idx')
                ->references('idtipact')->on('tipo_actividad')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idesact', 'fk_actividades_estado_actividad1_idx')
                ->references('idesact')->on('estado_actividad')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idrecinto', 'fk_actividades_recinto1_idx')
                ->references('idrecinto')->on('recinto')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idarea', 'fk_actividades_area1_idx')
                ->references('idarea')->on('area')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idsubgerencia', 'fk_actividades_subgerencia1_idx')
                ->references('idsubgerencia')->on('subgerencia')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idgerencia', 'fk_actividades_gerencia1_idx')
                ->references('idgerencia')->on('gerencia')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('iddireccion', 'fk_actividades_direccion1_idx')
                ->references('iddireccion')->on('direccion')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idinfra', 'fk_actividades_infraestructura1_idx')
                ->references('idinfra')->on('infraestructura')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idasigcon', 'fk_actividades_asignacion_contratos1_idx')
                ->references('idasigcon')->on('asig_contratos')
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
