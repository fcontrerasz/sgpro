<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'usuarios';

    /**
     * Run the migrations.
     * @table usuarios
     *
     * @return void
     */




    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idusuario');
            $table->integer('idempresas')->nullable()->unsigned();
            //$table->string('usuario_nombre', 45)->nullable();
            $table->integer('usuario_estado')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->index(["idempresas"], 'fk_usuarios_empresas1_idx');

            $table->foreign('idempresas', 'fk_usuarios_empresas1_idx')
                ->references('idempresas')->on('contratistas')
                ->onDelete('no action')
                ->onUpdate('no action');
        });


        DB::table('usuarios')->insert(
        array(
            'name' => 'Administrador',
            'usuario_estado' => 1,
            'email' => 'admin@patache.cl',
            'password' => '$2y$10$WHGFsPfXkHavbsKyLUYSreRkIePdcU36YYQ8qu3FCQScuMDaWVZO2'
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
