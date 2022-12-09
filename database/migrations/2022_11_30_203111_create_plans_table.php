<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
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
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('color');
            $table->decimal('roi', 5,2);
            $table->decimal('min', 17, 2);
            $table->decimal('max', 17, 2);
            $table->integer('intervals');
            $table->foreignId('period_id')
                  ->constrained()
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId('duration_id')
                  ->constrained('periods')
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
            $table->decimal('referral_bonus', 5, 2)->default(10);
            $table->timestamps();
            $table->softDeletes();
        });

        Artisan::call('db:seed', [
            '--class' => 'PlanSeeder'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
