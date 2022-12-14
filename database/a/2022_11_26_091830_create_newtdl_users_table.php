<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewtdlUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newtdl_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('statusAssigner')->comment('وضعیت بررسی ارجاع دهنده  ')->default('بررسی نشده');
            $table->text('descriptionAssigner')->comment(' توضیحات بعداز بررسی ارجاع دهنده  ')->nullable();
            $table->string('status')->comment('وضعیت انجام متولی انجام  ')->default('بررسی نشده');
            $table->text('result')->nullable()->comment('نتیجه');
            $table->string('attachment')->nullable()->comment('فایل پیوست متولی انجام');
            $table->unsignedInteger('user_id')->comment('متولی انجام');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('newtdl_id');
            $table->foreign('newtdl_id')->references('id')->on('newtdls');
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
        Schema::dropIfExists('newtdl_users');
    }
}
