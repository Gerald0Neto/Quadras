<?php

namespace App\Models\LoginUser;

use App\Connections\Conexao;
use PDO;

class LoginFormModel
{
    public function buscarDadosUser($email, $senha){
        // STMT -> instrução
        $db = Conexao::getConnection();
        $stmtquery = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $db->prepare($stmtquery);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $stmtDadosUser = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$stmtDadosUser) {
            return false;
        }

        if(!password_verify($senha, $stmtDadosUser['senha'])){
            // login autorizado
            return false;

        }

        return $stmtDadosUser;
    }

}