<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dichvu_dichvudats', function (Blueprint $table) {

            $table->unsignedBigInteger('dichvudat_id');
            $table->foreign('dichvudat_id')
                ->references('id')
                ->on('dichvudats')
                ->onDelete('cascade');
            $table->unsignedBigInteger('dichvu_id');
            $table->foreign('dichvu_id')
                ->references('id')
                ->on('dichvus')

                ->onDelete('cascade');
            $table->primary(['dichvudat_id', 'dichvu_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dichvu_dichvudats_');
    }
};
