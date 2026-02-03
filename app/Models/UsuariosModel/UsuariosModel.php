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
}