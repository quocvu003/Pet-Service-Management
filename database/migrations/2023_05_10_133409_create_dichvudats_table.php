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
        Schema::create('dichvudats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')
                ->onDelete('cascade');
            $table->unsignedBigInteger('taikhoan_id');
            $table->foreign('taikhoan_id')
                ->references('id')
                ->on('taikhoans')
                ->onDelete('cascade');
            $table->date('ngay');
            $table->time('gio');
            $table->integer('loaithucung');

            $table->string('ten');
            $table->string('email');
            $table->string('sdt');
            $table->integer('tongtien');

            $table->integer('trangthai');
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
        Schema::dropIfExists('dichvudats');
    }
};
