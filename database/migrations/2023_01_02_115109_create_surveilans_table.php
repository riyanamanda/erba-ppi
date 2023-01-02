<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveilans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien')->constrained('pasien')->cascadeOnDelete();
            $table->integer('surveilansable_id')->unsigned();
            $table->string('surveilansable_type');
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
        Schema::dropIfExists('surveilans');
    }
};
