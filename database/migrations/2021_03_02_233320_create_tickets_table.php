<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->foreignId('sla_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->integer('reportedby');
            $table->dateTime('reporteddate');
            $table->string('problemsummary');
            $table->string('problemdetail');
            $table->string('status');
            $table->integer('assignee');
            $table->dateTime('assigneddate');
            $table->integer('pendingby');
            $table->dateTime('pendingdate');
            $table->string('resolution');
            $table->integer('resolvedby');
            $table->dateTime('resolveddate');
            $table->integer('closedby');
            $table->dateTime('closeddate');
            $table->integer('documentedby');
            $table->dateTime('documenteddate');
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
        Schema::dropIfExists('tickets');
    }
}
