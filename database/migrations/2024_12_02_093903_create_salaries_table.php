<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->string('month'); // For month like '2024-12'
            $table->decimal('total_working_days', 8, 2);
            $table->decimal('present_days', 8, 2);
            $table->decimal('absent_days', 8, 2);
            $table->decimal('paid_leave_days', 8, 2);
            $table->decimal('unpaid_leave_days', 8, 2);
            $table->decimal('deductions', 8, 2);
            $table->decimal('final_salary', 8, 2);
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
        Schema::dropIfExists('salaries');
    }
}
