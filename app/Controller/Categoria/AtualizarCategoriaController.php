<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;

class AtualizarCategoriaController extends AbstractController
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

            if (empty($requestData['nome'])) {
                throw new \Exception("Informe o nome da categoria!");
            }

            $novoId = null;

            if (isset($requestData['novo_id']) && $requestData['novo_id'] !== '') {
                $novoId = (int) $requestData['novo_id'];
            }

            $this->model->atualizar((int) $requestData['id'], trim($requestData['nome']), $novoId);

            $this->redirect('/categoria');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>
