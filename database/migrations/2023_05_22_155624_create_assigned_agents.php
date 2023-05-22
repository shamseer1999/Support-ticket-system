<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedAgents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_agents', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->integer('agent_id');
            $table->foreign('agent_id')->references('id')->on('users');
            $table->integer('assigned_by');
            $table->foreign('assigned_by')->references('id')->on('users');
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
        Schema::dropIfExists('assigned_agents');
    }
}
