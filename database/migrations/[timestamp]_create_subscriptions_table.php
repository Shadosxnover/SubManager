<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('service_name', 100);
            $table->string('subscription_tier', 50);
            $table->decimal('price', 8, 2);
            $table->date('next_payment_date');
            $table->enum('billing_cycle', ['monthly', 'annually']);
            $table->enum('service_status', ['active', 'paused', 'expired'])->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
