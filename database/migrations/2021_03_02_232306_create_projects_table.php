<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('customer_id')->constrained();
            $table->dateTime('deliverystart');
            $table->dateTime('deliveryend');
            $table->dateTime('installstart');
            $table->dateTime('installend');
            $table->dateTime('uatstart');
            $table->dateTime('uatend');
            $table->dateTime('billstart');
            $table->dateTime('billdue');
            $table->dateTime('warrantyperiod');
            $table->dateTime('contractstart');
            $table->dateTime('contractperiod');
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
        Schema::create('projects', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });
        Schema::dropIfExists('projects');
    }
}
