<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->id();

            $table->string('title'); // Название конкурса
            $table->text('description'); // Полное описание

            $table->string('image')->nullable(); // Изображение конкурса

            $table->date('start_date'); // Дата начала
            $table->date('end_date');   // Дата окончания

            $table->boolean('is_active')->default(true);
            // Включён ли конкурс (можно отключить вручную)

            $table->timestamps();

            // Индексы для ускорения выборок
            $table->index(['is_active', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contests');
    }
};
