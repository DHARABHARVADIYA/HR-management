<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostingsTable extends Migration
{
    public function up()
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('department_id'); // Foreign Key
            $table->string('location');
            $table->string('employment_type');
            $table->string('salary_range')->nullable();
            $table->string('skills_required');
            $table->integer('experience_required');
            $table->date('posted_date');
            $table->date('application_deadline');
            $table->string('status');
            $table->timestamps();

            // Define Foreign Key
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_postings');
    }
}
