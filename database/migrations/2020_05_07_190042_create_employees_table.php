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
            $table->integer('salaryID');
            $table->timestamps();
        });

        Schema::create('allowance', function (Blueprint $table) {
            $table->id();
            $table->string('allowanceName');
            $table->double('amount');
            $table->timestamps();
        });

        Schema::create('employeeAllowance', function (Blueprint $table) {
            $table->id();
            $table->integer('empid');
            $table->integer('allowanceID');
            $table->timestamps();
        });

        Schema::create('salary', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->string('category');
            $table->timestamps();
        });

        Schema::create('paidsalary', function (Blueprint $table) {
            $table->id();
            $table->integer('empID');
            $table->double('amount');
            $table->date('date');
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
        Schema::dropIfExists('employeeAllowance');
        Schema::dropIfExists('salary');
    }
}
