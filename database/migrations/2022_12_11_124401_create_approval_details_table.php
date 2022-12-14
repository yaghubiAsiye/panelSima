<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('approval_id');
            $table->foreign('approval_id')->references('id')->on('approvals');
            $table->string('eghdamKonande')->nullable();
            $table->string('radifeMosavvabe')->nullable();
            $table->string('sharheMosavvabe')->nullable();
            $table->string('mohlateEghdam')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('approval_details');
    }
}
