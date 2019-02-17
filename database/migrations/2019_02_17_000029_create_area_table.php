<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'area';

    /**
     * Run the migrations.
     * @table area
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idarea');
            $table->integer('idsubgerencia')->unsigned();
            $table->string('area_nombre', 45)->nullable();

            $table->index(["idsubgerencia"], 'fk_area_subgerencia1_idx');


            $table->foreign('idsubgerencia', 'fk_area_subgerencia1_idx')
                ->references('idsubgerencia')->on('subgerencia')
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
