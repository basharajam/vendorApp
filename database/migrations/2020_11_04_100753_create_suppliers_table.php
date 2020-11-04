<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();


            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('bank_account_owner_name');
            $table->string('company_name');
            $table->string('nationality');
            $table->string('shop_address');
            $table->string('national_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('passport_end_date')->nullable();

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
        Schema::dropIfExists('suppliers');
    }
}
