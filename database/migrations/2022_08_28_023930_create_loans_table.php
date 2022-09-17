<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('created_by');
            $table->string('inst_id');
            $table->double('amount', 8, 2);
            $table->double('interest_rate', 8, 2);
            $table->double('overdue_interest_rate', 8, 2)->default(0);
            $table->string('overdue')->default(0); //number of overdue
            $table->date('due_date')->nullable();
            $table->string('guarantor_name')->nullable();
            $table->string('guarantor_phone')->nullable();
            $table->date('repayment_date')->nullable();
            $table->string('tenure')->nullable();
            $table->tinyInteger('status')->default(0); //0 is created 1 is approved and activated 2 is rejected 3 is completed
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
        Schema::dropIfExists('loans');
    }
};
