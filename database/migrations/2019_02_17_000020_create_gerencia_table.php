<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGerenciaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'gerencia';

    /**
     * Run the migrations.
     * @table gerencia
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idgerencia');
            $table->integer('iddireccion')->unsigned();
            $table->string('gere_nombre', 45)->nullable();

            $table->index(["iddireccion"], 'fk_gerencia_direccion1_idx');


            $table->foreign('iddireccion', 'fk_gerencia_direccion1_idx')
                ->references('iddireccion')->on('direccion')
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
