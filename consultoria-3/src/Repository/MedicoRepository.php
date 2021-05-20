<?php
namespace App\Repository;

use App\Entity\Medico;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class MedicoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medico::class);
    }
    public function buscarMedico()
    {
        $builder = $this->createQueryBuilder('m')
                    ->join('m.especialidade','e')
                    ->addSelect('e')
                    ->getQuery();
        
        return $builder->getResult();
    }

    public function buscarMedicoEspecialidade($espId)
    {
        $builder = $this->createQueryBuilder('m')
                    ->join('m.especialidade','e')
                    ->addSelect('e')
                    ->where('e.id = :espId')
                    ->setParameter('espId',$espId)
                    ->getQuery();
        
        return $builder->getResult();
    }

}
