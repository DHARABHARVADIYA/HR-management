<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id(); // Leave ID
            $table->unsignedBigInteger('employee_id'); // Foreign Key
            $table->enum('leave_type', ['Paid', 'Unpaid', 'Sick', 'Casual']);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('leave_duration'); // Calculated field
            $table->enum('approval_status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->text('reason')->nullable();
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
