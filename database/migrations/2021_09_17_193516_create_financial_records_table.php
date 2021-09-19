<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_records', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('alias')->unique();
            $table->text('description')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->enum('type', ['expense', 'income'])->default('expense');
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
        Schema::dropIfExists('financial_records');
    }
}
