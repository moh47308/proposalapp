<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('address_line_3')->nullable();
            $table->timestamps();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('website')->nullable();
            $table->string('status')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mode')->nullable();
            $table->string('logo')->nullable();
            $table->integer('total_allowed_users')->default(1);
            $table->integer('total_users')->default(0);
            $table->integer('total_services')->default(10);
            $table->integer('total_allowed_proposals_in_month')->default(5);
            $table->integer('total_proposals_in_month')->default(0);
            $table->integer('total_allowed_clients_in_year')->default(250);
            $table->integer('total_clients_in_year')->default(0);
            $table->date('current_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
