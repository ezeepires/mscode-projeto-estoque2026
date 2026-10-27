<?php

namespace App\Controller\Login;

use App\Controller\AbstractController;
use App\Model\Usuario\UsuarioModel;

class LoginController extends AbstractController 
{

    private UsuarioModel $model;

    public function __construct()
    {
        $this->model = new UsuarioModel();
    }

    public function index(array $requestData): void 
    {
        try {
            if(empty($requestData['email']) || empty($requestData['password'])) {
                throw new \Exception('Preencha os campos para fazer login!');
            }

            $usuario = $this->model->validarUsuario($requestData['email'],
            $requestData['password']);

            $_SESSION['usuario'] = $usuario;

            $this->redirect('/home');
            
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>
