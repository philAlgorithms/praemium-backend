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
        Schema::create('plan_earnings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('index');
            $table->foreignId('deposit_id')
                  ->constrained()
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
            $table->decimal('amount', 17, 2);
            $table->decimal('roi', 5, 2);
            $table->decimal('percentage', 5, 2)->default(1);
            $table->timestamp('pay_date');
            $table->boolean('earned')->default(0);
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
        Schema::dropIfExists('plan_earnings');
    }
};
