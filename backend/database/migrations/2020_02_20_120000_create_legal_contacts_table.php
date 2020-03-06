<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLegalContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            DB::beginTransaction();
            Schema::create('legal_contacts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->string('position')->nullable();
                $table->unsignedInteger('legal_id');

                $table->foreign('legal_id')->references('id')->on('legals')->onDelete('cascade');
                $table->timestamps();
            });

            Schema::table('legals', function (Blueprint $table) {
                $table->foreign('signer_id')->references('id')->on('legal_contacts')->onDelete('cascade');
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $this->down();
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_contacts');
    }
}
