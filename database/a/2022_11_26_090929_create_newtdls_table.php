<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewtdlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newtdls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('نام فعالیت')->nullable();
            $table->text('description')->nullable()->comment('شرح');
            $table->unsignedInteger('user_id')->nullable()->comment('ثبت کننده فعالیت');
            $table->string('priority')->nullable()->comment('اهمیت');
            $table->text('assignerAttachment')->nullable()->comment('فایل ضمیمه ثبت کننده');
            $table->string('status')->nullable()->comment('وضعیت تایید همه')->default('بررسی نشده');
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
        Schema::dropIfExists('newtdls');
    }
}
