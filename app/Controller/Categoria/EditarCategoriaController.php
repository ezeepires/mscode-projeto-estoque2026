<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;

class EditarCategoriaController extends AbstractController
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
                throw new \Exception("Informe a categoria que deseja editar!");
            }

            $categoria = $this->model->buscarPorId((int) $requestData['id']);

            $this->render('categoria/editar_categoria.php', [
                'categoria' => $categoria,
            ]);
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>
