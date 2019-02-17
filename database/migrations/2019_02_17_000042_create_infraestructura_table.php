<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfraestructuraTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'infraestructura';

    /**
     * Run the migrations.
     * @table infraestructura
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idinfra');
            $table->integer('idrecinto')->unsigned();
            $table->string('infra_nombre', 45)->nullable();

            $table->index(["idrecinto"], 'fk_infraestructura_recinto1_idx');


            $table->foreign('idrecinto', 'fk_infraestructura_recinto1_idx')
                ->references('idrecinto')->on('recinto')
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
