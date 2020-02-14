<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { // создал таблицу через      php artisan make:migration create_tasks_table --create=tasks
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body');
            $table->timestamps();
        });
    } // после делаем миграцию в базу php artisan migrate
    // чтобы удалить поле в таблице, удаляем его в редакторе, а потом в командную строку пишем php artisan migrate:refresh
    // чтобы удалить таблицы из базы пишем php artisan migrate:reset

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
