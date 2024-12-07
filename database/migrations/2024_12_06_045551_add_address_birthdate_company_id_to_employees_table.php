<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressBirthdateCompanyIdToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Adding new columns
            $table->string('address')->nullable(); // Employee address
            $table->date('birthdate')->nullable(); // Employee birthdate
            $table->unsignedBigInteger('company_id')->nullable(); // Allow nullable company_id initially

            // Adding the foreign key constraint
            // We will make the constraint later after populating company_id for existing records
            // $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Dropping the columns and the foreign key if rolled back
            $table->dropForeign(['company_id']);
            $table->dropColumn(['address', 'birthdate', 'company_id']);
        });
    }
}
