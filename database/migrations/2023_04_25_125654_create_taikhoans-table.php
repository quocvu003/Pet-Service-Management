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
        Schema::create('taikhoans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')
                ->onDelete('cascade');
            $table->integer('quyen_id');
            $table->string('ten');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('matkhau');
            $table->string('diachi')->nullable();
            $table->string('sdt')->nullable();
            $table->string('hinhanh')->nullable()->default('/tempalte/avatar.jpg');
            $table->integer('trangthai')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('taikhoans');
    }
};
