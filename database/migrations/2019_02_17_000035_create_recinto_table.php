<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecintoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'recinto';

    /**
     * Run the migrations.
     * @table recinto
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idrecinto');
            $table->integer('idarea')->unsigned();
            $table->string('recin_nombre', 45)->nullable();

            $table->index(["idarea"], 'fk_recinto_area1_idx');


            $table->foreign('idarea', 'fk_recinto_area1_idx')
                ->references('idarea')->on('area')
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
