<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfitRatioToSupplierManager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplier_managers', function (Blueprint $table) {
            //
            $table->string('profit_ratio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supplier_managers', function (Blueprint $table) {
            //
            $table->dropColumn('profit_ratio');
        });
    }
}
