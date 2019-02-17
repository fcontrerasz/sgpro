<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrmAccincTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'frm_accinc';

    /**
     * Run the migrations.
     * @table frm_accinc
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idaccinc');
            $table->integer('idact')->unsigned();
            $table->string('accinc_nombre', 45)->nullable();

            $table->index(["idact"], 'fk_frm_accinc_actividades1_idx');


            $table->foreign('idact', 'fk_frm_accinc_actividades1_idx')
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
