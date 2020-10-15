<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('client_id')->unsigned();
            $table->integer('fund_id')->unsigned();
            $table->date('date');
            $table->float('amount', 16, 2);
        });

        Artisan::call(
            'db:seed',
            [
                '--class'          => "InvestmentsSeeder",
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
        Schema::dropIfExists('investments');
    }
}
