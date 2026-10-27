<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;

class CategoriaController extends AbstractController
{
    private CategoriaModel $model;

    public function __construct()
    {
        $this->model = new CategoriaModel();
    }

    public function index(array $requestData): void
    {
        try {
            $categorias = $this->model->listar();

            $this->render('categoria/categorias.php', [
                'categorias' => $categorias,
            ]);
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>
