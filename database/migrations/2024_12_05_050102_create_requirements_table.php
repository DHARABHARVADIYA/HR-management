<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Requirement Title
            $table->text('description'); // Detailed Description
            $table->enum('priority', ['Low', 'Medium', 'High', 'Urgent']); // Priority
            $table->decimal('budget', 10, 2)->nullable(); // Budget Estimate
            $table->date('deadline'); // Deadline
            $table->unsignedBigInteger('department_id'); // Department Reference
            $table->enum('status', ['Draft', 'Published', 'Completed', 'Archived'])->default('Draft'); // Status
            $table->unsignedBigInteger('created_by'); // Admin who created it
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirements');
    }
}
