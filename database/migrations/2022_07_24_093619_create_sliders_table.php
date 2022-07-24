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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string("slider_img",2048)->nullable();
            $table->string("slider_title",255)->nullable();
            $table->boolean('has_button',true)->default(false);
            $table->string("slider_button",2048)->nullable();
            $table->string("slider_link",2048)->nullable();
            $table->boolean('is_active',true)->default(true);
            $table->integer('rank')->default(0)->nullable();
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
        Schema::dropIfExists('sliders');
    }
};
