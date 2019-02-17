<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraAuditoriasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'bitacora_auditorias';

    /**
     * Run the migrations.
     * @table bitacora_auditorias
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idbitaud');
            $table->integer('idaudit')->unsigned();
            $table->string('bitaud_accion', 45)->nullable();
            $table->string('bitaud_fecha', 45)->nullable();
            $table->string('bitaud_usuario', 45)->nullable();
            $table->string('bitaud_comentario', 45)->nullable();

            $table->index(["idaudit"], 'fk_bitacora_auditorias_auditorias1_idx');


            $table->foreign('idaudit', 'fk_bitacora_auditorias_auditorias1_idx')
                ->references('idaudit')->on('auditorias')
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
