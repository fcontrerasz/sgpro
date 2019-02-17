<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubgerenciaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'subgerencia';

    /**
     * Run the migrations.
     * @table subgerencia
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idsubgerencia');
            $table->integer('idgerencia')->unsigned();
            $table->string('subger_nombre', 45)->nullable();

            $table->index(["idgerencia"], 'fk_subgerencia_gerencia1_idx');


            $table->foreign('idgerencia', 'fk_subgerencia_gerencia1_idx')
                ->references('idgerencia')->on('gerencia')
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
