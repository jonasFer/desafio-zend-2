<?php

namespace Application\Domain\Model;

use Application\Domain\Dto\VeiculoDto;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Veiculo
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
    private $placa;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $renavam;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $modelo;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $marca;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $ano;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $cor;

    /**
     * Veiculo constructor.
     * @param $placa
     * @param $renavam
     * @param $modelo
     * @param $marca
     * @param $ano
     * @param $cor
     */
    public function __construct($placa, $renavam, $modelo, $marca, $ano, $cor)
    {
        $this->placa = $placa;
        $this->renavam = $renavam;
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->ano = $ano;
        $this->cor = $cor;
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
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param string $placa
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    /**
     * @return string
     */
    public function getRenavam()
    {
        return $this->renavam;
    }

    /**
     * @param string $renavam
     */
    public function setRenavam($renavam)
    {
        $this->renavam = $renavam;
    }

    /**
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param string $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return int
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param int $ano
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    /**
     * @return string
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * @param string $cor
     */
    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    public function fromDto(VeiculoDto $dto) {
        $this->placa = $dto->getPlaca();
        $this->renavam = $dto->getRenavam();
        $this->marca = $dto->getMarca();
        $this->ano = $dto->getAno();
        $this->modelo = $dto->getModelo();
        $this->cor = $dto->getCor();
    }
}
