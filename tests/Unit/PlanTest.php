<?php

namespace Tests\Unit;

use App\Models\Plan;
use Tests\TestCase;

class PlanTest extends TestCase
{
    /**
     * @test
     */
    public function it_gets_earning_intervals()
    {
        $plan = Plan::all()->first();

        dump($plan->get_intervals($plan->min));

        $this->assertTrue(1);
    }
}
