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
        Schema::create('contest_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contest_id');
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('comment')->nullable();
            $table->string('work_file')->nullable(); // Путь к прикреплённому файлу
            $table->timestamps();

            // Внешний ключ для связи с конкурсом
            $table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_applications');
    }
};
