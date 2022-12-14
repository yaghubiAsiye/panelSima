<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalDetailUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_detail_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sender_id')->nullable();
            $table->unsignedInteger('user_id')->comment('متولی انجام');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('approval_detail_id');
            $table->foreign('approval_detail_id')->references('id')->on('approval_details');

            $table->string('sender_status')->comment('وضعیت')->default('بررسی نشده')->nullable();
            $table->string('receiver_status')->comment('وضعیت')->default('بررسی نشده')->nullable();
            $table->text('sender_result')->nullable()->comment('نتیجه')->nullable();
            $table->text('receiver_result')->nullable()->comment('نتیجه')->nullable();
            $table->string('receiver_attachment')->nullable()->comment('فایل پیوست متولی انجام')->nullable();
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
        Schema::dropIfExists('approval_detail_users');
    }
}
