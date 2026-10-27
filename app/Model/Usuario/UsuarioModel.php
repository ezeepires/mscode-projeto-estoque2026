<?php

namespace App\Model\Usuario;

use App\Database\Query;

class UsuarioModel
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function validarUsuario(string $email, string $password): Usuario
    {
        $condicao = " email = '{$email}'";

        $resultado = $this->query->select('usuario', $condicao);


        if (!$resultado) {
            throw new \Exception("E-mail inválido!");
        }

        if (!password_verify($password, $resultado[0]['senha'])) {
            throw new \Exception('Senha inválida!');
            
        }

        $usuario = new Usuario($resultado[0]['id'], $resultado[0]['nome']);

        return $usuario;
    }
}

?>
