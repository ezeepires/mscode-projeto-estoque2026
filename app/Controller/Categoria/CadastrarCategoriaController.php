<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;

class CadastrarCategoriaController extends AbstractController
{
    private CategoriaModel $model;

    public function __construct()
    {
        $this->model = new CategoriaModel();
    }

    public function index(array $requestData): void
    {
        try {
            if(empty($requestData['nome'])) {
                throw new \Exception("Informe o nome da categoria!");
            }

            if (! isset($requestData['id']) || trim((string) $requestData['id']) === '') {
                throw new \Exception("Informe o id da categoria!");
            }

            if (! ctype_digit(trim((string) $requestData['id']))) {
                throw new \Exception("Id inválido! Use apenas números inteiros");
            }

            $id = (int) $requestData['id'];

            $this->model->cadastrar(trim($requestData['nome']), $id);

            $this->redirect('/categoria');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>

