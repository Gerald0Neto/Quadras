<?php
namespace App\Models\UsuariosModel;

use App\Connections\Conexao;
use Dba\Connection;
use PDO;

class UsuariosModel
{
    public function listar()
    {
        $db = Conexao::getConnection();

        $sql = "SELECT  e.nome,
                        e.email,
                        e.telefone,
                        p.nome AS tipo_perfil,
                        p.css_class,
                        p.icon
                FROM usuarios e
                INNER JOIN perfis p ON e.perfil_id = p.id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function insert($dados)
    {
        $db = Conexao::getConnection();

        $senhaHash = password_hash($dados['senha'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha, telefone ,perfil_id)
                VALUES (:nome, :email, :senha, :telefone ,:tipo_user)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":nome",      $dados['nome'],     PDO::PARAM_STR);
        $stmt->bindParam(":email",     $dados['email'],    PDO::PARAM_STR);
        $stmt->bindParam(":senha",     $senhaHash,         PDO::PARAM_STR);
        $stmt->bindParam(":telefone",  $dados['telefone'], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_user", $dados['perfil'],   PDO::PARAM_INT);
        
        return $stmt->execute();
    }
}