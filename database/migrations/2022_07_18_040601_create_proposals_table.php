<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('goals')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('status')->default('Not Sent');
            $table->string('type')->default('Draft');
            $table->string('billing_option')->nullable();
            $table->string('billing_sub_option')->nullable();
            $table->string('billing_custom_option')->nullable();
            $table->string('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
