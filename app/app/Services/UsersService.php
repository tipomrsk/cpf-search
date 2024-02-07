<?php

namespace App\Services;

use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Http\Response;

class UsersService
{

    public function __construct(
        protected UsersRepositoryInterface $usersRepositoryInterface
    ){}

    public function getData($cpf)
    {
                // se cpf tiver menos de 11 caracteres retorna 401
        if (! $this->validaCPF($cpf)) {
            return response()->json(['message' => 'Invalid CPF'], Response::HTTP_BAD_REQUEST);
        }


        return response()->json(['message' => 'Its Ok!'], Response::HTTP_OK);
    }


    /**
     * @TODO
     * Refatorar para a camada de DTO na sequencia, esta aqui somente para testes
     *
     * @param $cpf
     * @return bool
     */
    private function validaCPF($cpf) {

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;

    }

}
