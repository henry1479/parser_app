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
        Schema::create('automobiles', function (Blueprint $table) {
            $table->id();
            $table->string('mark',255);
            $table->string('model',255);
            $table->string('generation')->nullable();
            $table->year('year')->nullable();
            $table->bigInteger('run')->default(0);
            $table->string('color', 100)->nullable();
            $table->string('body-type', 255)->nullable();
            $table->string('engine-type', 255)->nullable();
            $table->string('transmission', 255)->nullable();
            $table->string('gear-type', 255);
            $table->string('generation_id',100)->nullable();
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
        Schema::dropIfExists('automobyles');
    }
};
