<?php

namespace App\Controllers\publicarea;
use App\Models\AgendaMentoModel\AgendamentoModel;
use App\Services\Auth;

class Agendamento
{
    public function index(?string $param = null): void
    {
        $modelAgendamento = new AgendamentoModel();
        $dataInicial = new \DateTime();
        
        $dias     = $modelAgendamento->getSemana($dataInicial);
        $horarios = $modelAgendamento->getHorariosDisponiveis();
        
        Auth::check();
        require __DIR__ . '/../../Views/agendamento.php';
    }
}
