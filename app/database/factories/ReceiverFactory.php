<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receiver>
 */
class ReceiverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => 'd044581e-f75e-45b9-98b0-507c95df7487',
            'name' => 'Receiver Teste Factory',
            'cpf' => '12345678901',
            'address' => 'Rua Teste Factory',
            'state' => 'SP',
            'cep' => '12345678',
            'country' => 'Brasil',
            'lat' => '-23.5505199',
            'lng' => '-46.6333094',
        ];
    }
}
