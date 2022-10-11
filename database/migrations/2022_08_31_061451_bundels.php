<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bundels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundels', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('number_allowed')->nullable();
            $table->boolean('status')->nullable();
            $table->string('price')->nullable();
            $table->string('subscription_id')->nullable();
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
        //
    }
}
