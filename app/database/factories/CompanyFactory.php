<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fantasy_name' => 'Compania Teste Factory',
            'cnpj' => '12345678901234',
            'uuid' => '7c5c7174-288f-43e6-87c3-54efa2dd6d05',
        ];
    }
}
