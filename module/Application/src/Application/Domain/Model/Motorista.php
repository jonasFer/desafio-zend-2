<?php

namespace Application\Domain\Model;

use Application\Domain\Dto\MotoristaDto;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Motorista
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue("AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $rg;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $telefone;

    /**
     * @ORM\OneToOne(targetEntity="Veiculo")
     * @ORM\JoinColumn(name="id_veiculo", referencedColumnName="id", nullable=false)
     */
    private $veiculo;

    /**
     * Motorista constructor.
     * @param $nome
     * @param $rg
     * @param $cpf
     * @param $telefone
     * @param $veiculo
     */
    public function __construct($nome, $rg, $cpf, $telefone, $veiculo)
    {
        $this->nome = $nome;
        $this->rg = $rg;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->veiculo = $veiculo;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param mixed $rg
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    /**
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return Veiculo
     */
    public function getVeiculo()
    {
        return $this->veiculo;
    }

    /**
     * @param Veiculo $veiculo
     */
    public function setVeiculo($veiculo)
    {
        $this->veiculo = $veiculo;
    }

    public function fromDto(MotoristaDto $dto, Veiculo $veiculo) {
        $this->nome = $dto->getNome();
        $this->cpf = $dto->getCpf();
        $this->rg = $dto->getRg();
        $this->telefone = $dto->getTelefone();
        $this->veiculo = $veiculo;
    }
}