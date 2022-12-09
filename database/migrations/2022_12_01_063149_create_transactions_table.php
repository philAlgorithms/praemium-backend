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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('transactionable');
            $table->decimal('amount', 17, 2);
            $table->decimal('charge', 17, 2)->default(0);
            $table->foreignId('client_id')
                  ->nullable()
                  ->constrained('users')
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId('status_id')
                  ->constrained()
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId('coin_id')
                  ->nullable()
                  ->constrained()
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
            $table->string('sender_address')->nullable();
            $table->string('receiver_address')->nullable();
            $table->string('tx')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
