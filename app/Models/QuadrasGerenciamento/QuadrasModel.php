<?php

namespace App\Models\QuadrasGerenciamento;

use App\Connections\Conexao;
use PDO;

class QuadrasModel
{
    public function listar()
    {
        $db = Conexao::getConnection();
        $stmtquery = "SELECT	q.id,
                                q.nome,
                                q.status,
                                tq.nome AS tipo
                    FROM quadras q
                    INNER JOIN tipos_quadra tq
                    ON q.tipo_id = tq.id";
        $stmtexecute = $db->prepare($stmtquery);
        $stmtexecute->execute();
        $resultstmt = $stmtexecute->fetchAll(PDO::FETCH_ASSOC);;

        return $resultstmt;
    }

    public function excluir($dados)
    {
        $db = Conexao::getConnection();
        $sql = "DELETE FROM quadras WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $dados['id'], PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function inserir($dados)
    {
        $db = Conexao::getConnection();
        $sql = "INSERT INTO quadras (nome, tipo_id, status)
                VALUES (:nome, :tipo, :status)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":nome", $dados['nome'],     PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $dados['tipo'],     PDO::PARAM_INT);
        $stmt->bindParam(":status", $dados['status'], PDO::PARAM_STR);
        return $stmt->execute($dados);
    }
}
