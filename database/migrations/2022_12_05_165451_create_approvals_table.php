<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('درج کننده');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('date')->nullable();
            $table->string('number')->nullable();
            $table->string('MeetingType')->nullable();
            $table->string('title')->nullable();
            $table->text('hazerin')->nullable();
            $table->string('fileSooratJalase')->nullable();
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
        Schema::dropIfExists('approvals');
    }
}
