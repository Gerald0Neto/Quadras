<?php
namespace App\Models\AgendaMentoModel;

use App\Connections\Conexao;
use PDO;
use DateTime;

class AgendamentoModel
{

    public function getHorariosDisponiveis()
    {
        $db = Conexao::getConnection();
        $query = "SELECT id, hora FROM horarios ORDER BY hora ASC";
        $stmt = $db->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getSemana(DateTime $dataInicial)
    {
        $dias = [];

        for ($i = 0; $i < 7; $i++) {;
            $data = clone $dataInicial;
            $data->modify("+$i day");

            $dias[] = [
                'label' => $this->diaSemana($data->format('w')) . ' ' . $data->format('d'),
                'data'  => $data->format('Y-m-d')
            ];
        }

        return $dias;
    }

    private function diaSemana($dia) {
        return ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'][$dia];
    }


    public function insert($dados)
    {
        $db = Conexao::getConnection();

        $querystmt = "INSERT INTO agendamentos (data, horario_id, quadra_id, usuario_id, duracao, status, observacoes) 
                      VALUES (:data, :horario_id, :quadra_id, :usuario_id, :duracao, :status, :observacoes)";

        $stmtexecute = $db->prepare($querystmt);
        $stmtexecute->bindParam(":data",       $dados['data'],        PDO::PARAM_STR);
        $stmtexecute->bindParam(":horario_id", $dados['horario_id'],  PDO::PARAM_INT);
        $stmtexecute->bindParam(":quadra_id",  $dados['quadra_id'],   PDO::PARAM_INT);
        $stmtexecute->bindParam(":usuario_id", $dados['usuario_id'],  PDO::PARAM_INT);
        $stmtexecute->bindParam(":duracao",    $dados['duracao'],     PDO::PARAM_INT);
        $stmtexecute->bindParam(":status",     $dados['status'],      PDO::PARAM_STR);
        $stmtexecute->bindParam(":observacoes",$dados['observacoes'], PDO::PARAM_STR);
        return $stmtexecute->execute();
    }

}