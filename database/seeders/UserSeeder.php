<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_details = [
            "name" => "admin",
            "username" => "admin",
            "email" => "osttveitjoseph@gmail.com",
            "password" => bcrypt("praemium#2023")
        ];

        $clients =[
            [
                "name" => "Stephen King",
                "username" => "steve",
                "email" => "steveking9@gmail.com",
                "password" => bcrypt("praemium#2023")
            ],
            [
                "name" => "Sophia Herald",
                "username" => "sofia",
                "email" => "sofiah9@gmail.com",
                "password" => bcrypt("praemium#2023")
            ]
        ];
 
        $admin = User::create($admin_details);

        $admin->assignRole('admin');

        foreach($clients as $client)
        {
            $user = User::create($client);
            $user->assignRole('client');
        }
    }
}
