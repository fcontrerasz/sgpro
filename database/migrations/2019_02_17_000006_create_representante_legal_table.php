<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentanteLegalTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'representante_legal';

    /**
     * Run the migrations.
     * @table representante_legal
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idrepleg');
            $table->string('repleg_rut', 10)->nullable();
            $table->string('repleg_dv', 1)->nullable();
            $table->string('repleg_nombres', 45)->nullable();
            $table->string('repleg_apellidos', 45)->nullable();
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
