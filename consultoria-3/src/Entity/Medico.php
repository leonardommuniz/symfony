<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MedicoRepository;

/**
 * @ORM\Entity(repositoryClass=MedicoRepository::class)
 */
class Medico implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $crm;
    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @ORM\ManyToOne(targetEntity=Especialidade::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $especialidade;

    public function getEspecialidade(): ?Especialidade
    {
        return $this->especialidade;
    }

    public function setEspecialidade(?Especialidade $especialidade): self
    {
        $this->especialidade = $especialidade;

        return $this;
    }

    /**
     * Get the value of crm
     */ 
    public function getCrm()
    {
        return $this->crm;
    }

    /**
     * Set the value of crm
     *
     * @return  self
     */ 
    public function setCrm($crm)
    {
        $this->crm = $crm;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    public function jsonSerialize()
    {
        return [
            'id'=> $this->getId(),
            'crm'=> $this->getCrm(),
            'nome'=> $this->getNome(),
            'especialidadeId'=>$this->getEspecialidade()
        ];
    }
}
