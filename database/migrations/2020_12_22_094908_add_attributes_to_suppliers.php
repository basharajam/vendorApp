<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributesToSuppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            //
                $table->string('company_countries')->nullable();
                $table->string('countries_which_company_doesnot_work_with')->nullable();
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
            $table->dropColumn('company_countries');
            $table->dropColumn('countries_which_company_doesnot_work_with');
        });
    }
}
