<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttsToSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('comany_since')->nullable();
            $table->string('company_address_sector')->nullable();
            $table->string('company_address_city')->nullable();
            $table->boolean('ischinese')->default(false);
            $table->string('mobile_number');

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
            $table->dropColumn('age');
            $table->dropColumn('gender');
            $table->dropColumn('comany_since');
            $table->dropColumn('company_address_sector');
            $table->dropColumn('company_address_city');
            $table->dropColumn('ischinese');
            $table->dropColumn('mobile_number');
        });
    }
}
