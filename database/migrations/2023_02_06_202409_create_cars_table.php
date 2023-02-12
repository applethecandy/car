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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('Пользователь автомобиля');
            $table->tinyText('name')->comment('Марка автомобиля');
            $table->unsignedMediumInteger('mileage')->default(0)->comment('Текущий пробег автомобиля');
            $table->text('image_path')->nullable()->comment('Путь до изображения автомобиля');
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
        Schema::dropIfExists('cars');
    }
};
