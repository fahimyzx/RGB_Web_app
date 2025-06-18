<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    if (!Schema::hasTable('rgb_objects')) {
        Schema::create('rgb_objects', function (Blueprint $table) {
            $table->id();
            $table->integer('red');
            $table->integer('green');
            $table->integer('blue');
            $table->string('object_color')->nullable();
            $table->string('object_material')->nullable();
            $table->string('object_thickness')->nullable();
            $table->string('object_specific_data')->nullable();
            $table->timestamps();
        });
    }
}

public function down()
{
    Schema::dropIfExists('rgb_objects');
}

};
