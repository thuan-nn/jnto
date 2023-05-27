<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharedCampaignLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_campaign_logs', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('campaign_id', 36);
            $table->string('campaign_type');
            $table->string('user_id');
            $table->timestamp('shared_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shared_campaign_logs');
    }
}
