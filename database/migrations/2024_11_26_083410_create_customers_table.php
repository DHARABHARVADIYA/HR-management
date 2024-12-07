<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('gstin')->nullable();
            $table->string('pancard_no')->nullable();
            $table->string('email')->unique();
            $table->string('mobile_no')->unique();
            $table->text('address')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('contact_person')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
