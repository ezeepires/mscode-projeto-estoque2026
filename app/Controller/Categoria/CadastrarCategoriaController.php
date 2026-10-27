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

            $id = null;

            if (isset($requestData['id']) && $requestData['id'] !== '') {
                $id = (int) $requestData['id'];
            }

            $this->model->cadastrar(trim($requestData['nome']), $id);

            $this->redirect('/categoria');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>

