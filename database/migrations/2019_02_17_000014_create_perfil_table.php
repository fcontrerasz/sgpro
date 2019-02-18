<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'perfil';

    /**
     * Run the migrations.
     * @table perfil
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idperfil');
            $table->string('perfil_nombre', 45)->nullable();
            $table->string('perfil_glosa',45)->nullable();
        });

        $data = array(
            array('perfil_glosa' => 'Super Administrador', 'perfil_nombre' => 'superadmin'),
            array('perfil_glosa' => 'Administrador', 'perfil_nombre' => 'admin'),
            array('perfil_glosa' => 'Generico', 'perfil_nombre' => 'generico'),
            array('perfil_glosa' => 'Auditor', 'perfil_nombre' => 'auditor'),
            array('perfil_glosa' => 'Experto', 'perfil_nombre' => 'experto'),
            array('perfil_glosa' => 'Contratista', 'perfil_nombre' => 'contratista')
        );
       // Model::insert($data);
        DB::table('perfil')->insert($data);
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
