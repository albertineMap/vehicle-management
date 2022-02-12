<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vin')->unique();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('model_year')->nullable();
            $table->string('trim')->nullable();
            $table->string('body_class')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('driver_type')->nullable();
            $table->string('fuel_type_primary')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->unsigned()->index()
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_vehicles');
    }
}
