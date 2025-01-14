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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->startingValue(8568907);
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('user_id');
            $table->string('email');
            $table->string('transition_id')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->integer('zip');
            $table->double('shipping', 6, 2)->default(0);
            $table->double('total_price',10,2)->default(0);
            $table->enum('payment_method', ['cod', 'ssl']);
            $table->enum('status',['approved', 'cancel', 'delivered', 'received', 'success', 'pending', 'failed', 'complete','processing'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
};
