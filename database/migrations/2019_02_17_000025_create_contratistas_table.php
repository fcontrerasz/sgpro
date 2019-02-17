<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratistasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'contratistas';

    /**
     * Run the migrations.
     * @table contratistas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idempresas');
            $table->integer('comunas_idcomuna')->unsigned();
            $table->integer('region_idregion')->unsigned();
            $table->integer('mandante_idmdt')->unsigned();
            $table->string('emp_nombre', 150)->nullable();
            $table->string('emp_rut', 10)->nullable();
            $table->string('emp_dv', 1)->nullable();
            $table->string('emp_giro', 45)->nullable();
            $table->string('emp_direccion_1', 45)->nullable();
            $table->string('emp_direccion_2', 45)->nullable();
            $table->integer('emp_dotacion')->nullable();
            $table->string('emp_mail_1', 45)->nullable();
            $table->string('emp_mail_2', 45)->nullable();
            $table->string('emp_fono_1', 45)->nullable();
            $table->string('emp_fono_2', 45)->nullable();

            $table->index(["region_idregion"], 'fk_empresas_region1_idx');

            $table->index(["comunas_idcomuna"], 'fk_empresas_comunas1_idx');

            $table->index(["mandante_idmdt"], 'fk_empresas_mandante1_idx');


            $table->foreign('comunas_idcomuna', 'fk_empresas_comunas1_idx')
                ->references('idcomuna')->on('comunas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('region_idregion', 'fk_empresas_region1_idx')
                ->references('idregion')->on('region')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('mandante_idmdt', 'fk_empresas_mandante1_idx')
                ->references('idmdt')->on('mandante')
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
