<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                "key" => "SUCCESS",
                "name" => "succesful",
                "icon" => "fas fa-check",
                "color" => "success"
            ],
            [
                "key" => "PENDING",
                "name" => "pending",
                "icon" => "fas fa-redo",
                "color" => "warning"
            ],
            [
                "key" => "PROCESSING",
                "name" => "pending",
                "icon" => "spinner-border spinner-border-sm",
                "color" => "secondary"
            ],
            [
                "key" => "FAILED",
                "name" => "unsuccesful",
                "icon" => "fas fa-times",
                "color" => "danger"
            ],
            [
                "key" => "DECLINED",
                "name" => "declined",
                "icon" => "fas fa-times",
                "color" => "danger"
            ],
        ];

        foreach($statuses as $status)
        {
            Status::create($status);
        }
    }
}
