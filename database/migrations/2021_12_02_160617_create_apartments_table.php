<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->text('description');
            $table->string('city',100);
            $table->string('address',100);
            $table->decimal('latitude',8,6);
            $table->decimal('longitude',9,6);
            $table->float('price',7,2);
            $table->string('type',100);
            $table->tinyInteger('total_room');
            $table->tinyInteger('total_guest');
            $table->tinyInteger('total_bathroom');
            $table->smallInteger('mq');
            $table->boolean('is_visible');
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
        Schema::dropIfExists('apartments');
    }
}
