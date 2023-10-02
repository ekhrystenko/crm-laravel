<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientCompany;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Company::factory(11000)->create();
        Client::factory(15000)->create();
        ClientCompany::factory(10000)->create();
    }
}
