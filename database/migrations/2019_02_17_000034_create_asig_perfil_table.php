<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsigPerfilTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'asig_perfil';

    /**
     * Run the migrations.
     * @table asig_perfil
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idasigrol');
            $table->integer('idusuario')->unsigned();
            $table->integer('idperfil')->unsigned();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();

            $table->index(["idusuario"], 'fk_usuarios_has_perfil_usuarios1_idx');

            $table->index(["idperfil"], 'fk_usuarios_has_perfil_perfil1_idx');


            $table->foreign('idusuario', 'fk_usuarios_has_perfil_usuarios1_idx')
                ->references('idusuario')->on('usuarios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idperfil', 'fk_usuarios_has_perfil_perfil1_idx')
                ->references('idperfil')->on('perfil')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        DB::table('asig_perfil')->insert(
        array(
            'idusuario' => 1,
            'idperfil' => 1
        )
        );

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
