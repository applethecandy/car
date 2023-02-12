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
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained()->comment('Автомобиль к которому относится расход');
            $table->foreignId('category_id')->constrained()->comment('Категория расхода');
            $table->tinyText('name')->comment('Наименование');
            $table->text('description')->nullable()->comment('Описание');
            $table->date('date')->comment('Дата');
            $table->unsignedMediumInteger('price')->comment('Потраченная сумма');
            $table->unsignedSmallInteger('fuel_price')->nullable()->comment('Цена за литр бензина');
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
        Schema::dropIfExists('costs');
    }
};
