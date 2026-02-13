<?php
namespace App\Models\AgendaMentoModel;

use DateTime;

class AgendamentoModel
{

    public function getHorariosDisponiveis()
    {
        // Simulação de horários disponíveis
        return [
            "06:00","07:00","08:00","09:00",
            "10:00","11:00","12:00",
            "13:00","14:00","15:00", "16:00","17:00",
            "18:00","19:00","20:00","21:00"
        ];
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

}