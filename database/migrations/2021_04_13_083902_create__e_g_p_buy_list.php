<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEGPBuyList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EGPBuyList', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->integer('old_balance');
            $table->integer('new_balance');
            $table->integer('BuyQuantity');
            $table->integer('OrderNumber');
            $table->date('AuthDate');
            $table->string('SlipPaper');
            $table->ipAddress('IP');
            $table->date('RegDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_e_g_p_buy_list');
    }
}
