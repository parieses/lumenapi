<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_logs', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('自增id');
            $table->integer('uid')->index()->comment('用户id');
            $table->string('router')->nullable()->comment('路由');
            $table->ipAddress('current_ip')->comment('用户ip');
            $table->text('params')->comment('请求参数');
            $table->text('sql')->comment('执行sql');
            $table->dateTime('created_at')->comment('创建时间');
            $table->char('type')->default('GET')->comment('请求类型');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_logs');
    }
}
