<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('full_name');
            $table->string('inn');
            $table->string('ogrn');
            $table->string('kpp')->nullable();
            $table->string('opp')->nullable();
            $table->string('address');
            $table->unsignedInteger('signer_id')->nullable();
            $table->timestamps();

            $table->unique(['inn', 'kpp']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legals');
    }
}
