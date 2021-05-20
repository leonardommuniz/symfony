<?php

namespace App\Helper;

use App\Entity\Medico;
use App\Repository\EspecialidadeRepository;

class MedicoFactory
{

    public function __construct(EspecialidadeRepository $especialidadeRepository)
    {
        $this->especialidadeRepository = $especialidadeRepository;
    }

    public function criarMedico(string $json): Medico
    {
        $dadoEmJson = json_decode($json);
        $especialidadeId = $dadoEmJson->especialidadeId;
        $especialidade = $this->especialidadeRepository->find($especialidadeId); 

        $medico = new Medico();
        $medico
        ->setCrm($dadoEmJson->crm)
        ->setNome($dadoEmJson->nome)
        ->setEspecialidade($especialidade);

        return $medico;
    }
}