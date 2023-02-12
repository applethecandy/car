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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained()->comment('К какому автомобилю относится задача');
            $table->tinyText('name')->comment('Наименование');
            $table->text('description')->nullable()->comment('Описание');
            $table->unsignedMediumInteger('mileage')->nullable()->comment('На каком пробеге была выполнена задача');
            $table->unsignedMediumInteger('to_mileage')->nullable()->comment('На каком пробеге должна быть выполнена задача');
            $table->unsignedMediumInteger('every_mileage')->nullable()->comment('Повторять задачу каждое количество километров пробега');
            $table->date('date')->nullable()->comment('Дата выполнения задачи');
            $table->unsignedSmallInteger('to_date')->nullable()->comment('Через сколько дней должна быть выполнена задача');
            $table->unsignedSmallInteger('every_date')->nullable()->comment('Повторять задачу каждое количество дней');
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
        Schema::dropIfExists('tasks');
    }
};
