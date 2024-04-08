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
            $table->id();
        $table->string('paymentid');
        $table->string('name');
        $table->dateTime('added_date');
        $table->float('totalprice');
        $table->text('address');
        $table->string('state');
        $table->string('city');
        $table->string('pincode');
        $table->string('mobile');
        $table->string('userid');
        $table->string('status')->default('0'); // Default status is pending
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
