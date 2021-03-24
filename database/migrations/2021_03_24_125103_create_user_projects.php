<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Carbon;

class CreateUserProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_projects', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('project_name');
            $table->string('sql_host');
            $table->string('sql_username');
            $table->string('sql_password');
            $table->string('db_account');
            $table->string('db_shard');
            $table->string('db_shardlog');
            $table->ipAddress('server_host');
            $table->integer('server_port');
            $table->string('server_accountid');
            $table->string('server_accountpw');
            $table->string('server_charname')->default('AutoEvent');
            $table->string('server_captcha')->nullable();
            $table->date('start_license')->default(Carbon::now());
            $table->date('end_license')->default(Carbon::now()->addDays(30));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_projects');
    }
}
