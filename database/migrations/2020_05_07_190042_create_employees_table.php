<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('empname'); 
            $table->integer('salaryid');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('allowance', function (Blueprint $table) {
            $table->id();
            $table->string('allowancename');
            $table->double('amount');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('employeeallowance', function (Blueprint $table) {
            $table->id();
            $table->integer('empid');
            $table->integer('allowanceid');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('salary', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->string('category');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('paidsalary', function (Blueprint $table) {
            $table->id();
            $table->integer('empid');
            $table->double('amount');
            $table->date('date');
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
        Schema::dropIfExists('employees');
        Schema::dropIfExists('allowance');
        Schema::dropIfExists('employeeallowance');
        Schema::dropIfExists('salary');
        Schema::dropIfExists('paidsalary');
    }
}
