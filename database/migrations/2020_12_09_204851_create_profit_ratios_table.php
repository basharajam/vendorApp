<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfitRatiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_ratios', function (Blueprint $table) {
            $table->id();
            $table->string('ratio');

            $table->unsignedBigInteger('term_taxonomy_id');

            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('supplier_managers');

            $table->softDeletes();
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
        Schema::dropIfExists('profit_ratios');
    }
}
