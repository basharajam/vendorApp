<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTermTaxonomy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(\Genderal::DB_PREFIX.'term_taxonomy', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('supplier_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(\Genderal::DB_PREFIX.'term_taxonomy', function (Blueprint $table) {
            $table->dropColumn('supplier_id');

        });
    }
}
