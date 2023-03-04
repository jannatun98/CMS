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
        Schema::create('crisis', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string("name",50);
            $table->text("description")->nullable();
            $table->string("location",50);
            $table->string("amount_need",50);
            $table->string("amount_raised",50);
            $table->string("crisistype_id",50);
            $table->string("from_date");
            $table->string("to_date");
            $table->string("volunteer_id");
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
        Schema::dropIfExists('crisis');
    }
};
