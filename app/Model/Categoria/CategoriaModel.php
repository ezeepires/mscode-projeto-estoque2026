<?php

namespace App\Model\Categoria;

use App\Database\Query;

class CategoriaModel
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function cadastrar(string $nome, ?int $id = null): void
    {
        $dados = [
            'nome' => $nome,
        ];

        if ($id !== null) {
            if ($this->existe($id)) {
                throw new \Exception("Já existe uma categoria com o id {$id}!");
            }

            $dados['id'] = $id;
        }

        $resultado = $this->query->insert('categoria', $dados);

        if (! $resultado) {
            throw new \Exception("Erro ao criar categoria: " . $nome);
            
        }
    }

    public function listar(): array
    {
        $resultado = $this->query->select('categoria');

        if ($resultado === false) {
            throw new \Exception("Erro ao listar categorias!");
        }

        return $resultado;
    }

    public function buscarPorId(int $id): array
    {
        $resultado = $this->query->select('categoria', "id = {$id}");

        if (! $resultado) {
            throw new \Exception("Categoria não encontrada!");
        }

        return $resultado[0];
    }

    public function atualizar(int $id, string $nome, ?int $novoId = null): void
    {
        $this->buscarPorId($id);

        $dados = [
            'nome' => $nome,
        ];

        if ($novoId !== null && $novoId !== $id) {
            if ($this->existe($novoId)) {
                throw new \Exception("Já existe uma categoria com o id {$novoId}!");
            }

            if ($this->possuiProdutos($id)) {
                throw new \Exception("Não é possível alterar o id de uma categoria que possui produtos vinculados!");
            }

            $dados['id'] = $novoId;
        }

        $resultado = $this->query->update('categoria', $dados, "id = {$id}");

        if (! $resultado) {
            throw new \Exception("Erro ao atualizar categoria: " . $nome);
        }
    }

    public function excluir(int $id): void
    {
        $this->buscarPorId($id);

        if ($this->possuiProdutos($id)) {
            throw new \Exception("Não é possível excluir a categoria, pois existem produtos vinculados a ela!");
        }

        $resultado = $this->query->delete('categoria', "id = {$id}");

        if (! $resultado) {
            throw new \Exception("Erro ao excluir categoria!");
        }
    }

    private function existe(int $id): bool
    {
        $resultado = $this->query->select('categoria', "id = {$id}", 'COUNT(*) AS total');

        if ($resultado === false) {
            throw new \Exception("Erro ao verificar a categoria!");
        }

        return ! empty($resultado[0]['total']);
    }

    private function possuiProdutos(int $id): bool
    {
        $resultado = $this->query->select('produto', "categoria_id = {$id}", 'COUNT(*) AS total');

        if ($resultado === false) {
            throw new \Exception("Erro ao verificar os produtos da categoria!");
        }

        return ! empty($resultado[0]['total']);
    }
}

?>

