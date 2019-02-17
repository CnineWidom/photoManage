<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PCaseList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_case_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100)->comment('标题');
            $table->string('keywords',100)->comment('关键字（多项）');
            $table->text('content')->comment('内容');
            $table->string('author',100)->comment('作者');
            $table->string('device',100)->comment('成像设备');
            $table->tinyInteger('issue')->unsigned()->comment('是否发布');
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
        Schema::dropIfExists('p_case_list');
    }
}
