<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('bills')) {
            Schema::create('bills', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('subscription_id');
                $table->date('next_payment_date');
                $table->enum('payment_status', ['paid', 'due_soon', 'overdue'])->default('due_soon');
                $table->timestamps();

                $table->foreign('subscription_id')
                      ->references('id')
                      ->on('subscriptions')
                      ->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
