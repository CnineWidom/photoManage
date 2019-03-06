<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PCasePhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_case_photo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cid')->default(0)->comment('案例ID');
            $table->string('img',255)->comment('图片路径');
            $table->integer('views')->default(0)->comment('浏览次数');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_case_photo');
    }
}
