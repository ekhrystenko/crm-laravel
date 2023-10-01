<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientCompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => Client::inRandomOrder()->first()->id,
            'company_id' => Company::inRandomOrder()->first()->id,
        ];
    }
}
