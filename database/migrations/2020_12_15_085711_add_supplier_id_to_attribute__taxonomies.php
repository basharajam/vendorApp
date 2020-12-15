<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSupplierIdToAttributeTaxonomies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(\General::DB_PREFIX."woocommerce_attribute_taxonomies", function (Blueprint $table) {
            //
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->unsignedBigInteger('term_taxonomy_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(\General::DB_PREFIX."woocommerce_attribute_taxonomies", function (Blueprint $table) {
            $table->dropColumn('supplier_id');
            $table->dropColumn('term_taxonomy_id');

        });
    }
}
