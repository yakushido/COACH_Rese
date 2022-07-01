<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->char('name')->nullable(false);
            $table->text('detail')->nullable(false);
            $table->string('picture');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('genre_id');
            $table->timestamps();

            $table  ->foreign("area_id")
                    ->references("id")
                    ->on("areas")
                    ->onDelete("cascade");

            $table  ->foreign("genre_id")
                    ->references("id")
                    ->on("genres")
                    ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
