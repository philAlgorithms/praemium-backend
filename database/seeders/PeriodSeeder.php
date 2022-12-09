<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periods = [
            [
                "singular" => "second",
                "plural" => "seconds",
                "adverb" => "secondly"
            ],
            [
                "singular" => "minute",
                "plural" => "minutes",
                "adverb" => "minutely"
            ],
            [
                "singular" => "hour",
                "plural" => "hours",
                "adverb" => "hourly"
            ],
            [
                "singular" => "day",
                "plural" => "days",
                "adverb" => "daily"
            ],
            [
                "singular" => "week",
                "plural" => "weeks",
                "adverb" => "weekly"
            ],
            [
                "singular" => "month",
                "plural" => "months",
                "adverb" => "monthly"
            ],
            [
                "singular" => "year",
                "plural" => "years",
                "adverb" => "yearly"
            ],
        ];

        foreach($periods as $period)
        {
            Period::create($period);
        }
    }
}
