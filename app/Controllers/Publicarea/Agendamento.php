<?php

namespace App\Controllers\publicarea;
use App\Models\AgendaMentoModel\AgendamentoModel;
use App\Models\QuadrasGerenciamento\QuadrasModel;
use App\Models\UsuariosModel\UsuariosModel;
use App\Services\Auth;

class Agendamento
{
    public function insert()
    {
        $modelAgendamento = new AgendamentoModel();
        $dados = [
            'data'        => $_POST['data'],
            'horario_id'  => $_POST['horario_id'],
            'quadra_id'   => $_POST['quadra_id'],
            'usuario_id'  => $_POST['usuario_id'],
            'duracao'     => $_POST['duracao'],
            'status'      => $_POST['status'],
            'observacoes' => $_POST['observacoes']
        ];

        $modelAgendamento->insert($dados);
        header("Location: ../Agendamento");
        
    }
    
    public function index(?string $param = null): void
    {
        $modelAgendamento = new AgendamentoModel();
        $quadrasModel     = new QuadrasModel();
        $listarUsers      = new UsuariosModel();
        $dataInicial      = new \DateTime();
        
        $dias          = $modelAgendamento->getSemana($dataInicial);
        $horarios      = $modelAgendamento->getHorariosDisponiveis();
        $listarQuadras = $quadrasModel->listar();
        $listarUsuarios = $listarUsers->listar();

        Auth::check();
        require __DIR__ . '/../../Views/agendamento.php';
    }
}
