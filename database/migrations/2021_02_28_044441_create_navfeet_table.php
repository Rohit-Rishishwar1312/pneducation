<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavfeetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navfeet', function (Blueprint $table) {
            $table->id();
            $table->string('nf_email');
            $table->string('nf_phone');
            $table->string('nf_des');
            $table->string('nf_address');
            $table->string('nf_logo_image');
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
        Schema::dropIfExists('navfeet');
    }
}
