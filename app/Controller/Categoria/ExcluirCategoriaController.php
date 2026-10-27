<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;

class ExcluirCategoriaController extends AbstractController
{
    private CategoriaModel $model;

    public function __construct()
    {
        $this->model = new CategoriaModel();
    }

    public function index(array $requestData): void
    {
        try {
            if (empty($requestData['id'])) {
                throw new \Exception("Informe a categoria que deseja excluir!");
            }

            $this->model->excluir((int) $requestData['id']);

            $this->redirect('/categoria');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>
