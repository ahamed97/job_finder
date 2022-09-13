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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->text('job_title');
            $table->string('seniority_level')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('salary')->nullable();
            $table->string('currency')->nullable();
            $table->string('company_size')->nullable();
            $table->string('company_domain')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
};
