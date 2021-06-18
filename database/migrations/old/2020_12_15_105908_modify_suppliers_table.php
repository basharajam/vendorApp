<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn('shop_address');

            $table->string('company_shop_address')->nullable();
            $table->string('company_office_address')->nullable();
            $table->string('company_warehouse_address')->nullable();
            $table->string('company_factory_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            //
            $table->string('shop_address');

            $table->dropColumn('company_shop_address');
            $table->dropColumn('company_office_address');
            $table->dropColumn('company_warehouse_address');
            $table->dropColumn('company_factory_address');
        });
    }
}
