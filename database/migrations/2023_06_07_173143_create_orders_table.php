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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();//The user doing the ordering
            $table->integer('manager_id')->unsigned();//The user/Admin in charge of the order
            $table->foreign('manager_id')->references('id')->on('users')->constrained();

            $table->longText('details');//Details like; items,location, price, comments and stuff go here.
            $table->date('dueDate')->nullable();
            $table->date('deliverOn')->nullable();
            $table->boolean('isPaid')->default(0);
            $table->boolean('isDelivered')->default(0);

            $table->double('price', 8, 2)->nullable();//Tho might be in the Details column/array as well
            $table->double('discount',8,2)->default(0);//querried from discounts table.

            $table->double('amountPaid',8,2)->default(0);
            $table->double('amountOwed',8,2)->default(0);//querried from discounts table.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
