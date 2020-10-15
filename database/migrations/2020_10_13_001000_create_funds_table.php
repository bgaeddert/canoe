<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type',['HF', 'PL', 'VC', 'RE', 'PC']);
            $table->date('inception_date');
            $table->string('description');
        });

        Artisan::call(
            'db:seed',
            [
                '--class'          => "FundsSeeder",
                '--no-interaction' => true,
                '--force'          => true,
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funds');
    }
}
