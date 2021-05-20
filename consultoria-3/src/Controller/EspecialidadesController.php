<?php

namespace App\Controller;

use App\Entity\Especialidade;
use App\Repository\EspecialidadeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class EspecialidadesController extends AbstractController
{

    private $repository;

    public function __construct(
        EntityManagerInterface $entityManager,
        EspecialidadeRepository $repository

    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    /**
     * @Route("/especialidades", name="especialidades", methods={"POST"})
     */
    public function index(Request $request): Response
    {

        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);

        $especialidade = new Especialidade;
        $especialidade->setDescricao($dadosEmJson->descricao);

        $this->entityManager->persist($especialidade);
        $this->entityManager->flush();

        return new JsonResponse($especialidade);
    }

    /**
     * @Route("/especialidades", methods={"GET"})
     */
    public function buscarTodos(){
        $especialidadeList = $this->repository->findAll();
        return new JsonResponse($especialidadeList);
    }

    /**
     * @Route("/especialidades/{id}", methods={"GET"})
     */

    public function buscarUma(int $id): Response
    {
        return new JsonResponse($this->repository->find($id));
    }

    /*
    * @Route("/especialidades/{id}", methods={PUT})
    */
    public function atualiza(int $id, Request $request): Response
    {

        $dadosRequest = $request->getContent();
        $dadosEmJson = json_decode($dadosRequest);

        $especialidade = $this->repository->find($id);
        $especialidade
            ->setDescricao($dadosEmJson->descricao);

        $this->entityManager->flush();

        return new JsonResponse($especialidade);

    }
    
}
