<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Schema data depends on what data will be in the excel sheets
        //Need an option to handle data that is different


       Schema::create('excel-data', function (Blueprint $table){
           $table->id();
           $table->string('First Name');
           $table->string('Last Name');
           $table->string('Gender');
           $table->string('Country');
           $table->string('Age');
           $table->string('DOB');
           $table->string('work_id');
           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excel-data');
    }
};
