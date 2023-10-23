<?php

namespace Application\Domain\Dto;

use Application\Domain\Model\Veiculo;
use Zend\Form\Annotation;
use Zend\Mvc\Controller\Plugin\Params;

/**
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("VeiculoDto")
 */

class VeiculoDto
{
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StringToUpper"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"7"}})
     */
    private $placa;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StringToUpper"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"30"}})
     */
    private $renavam;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"20"}})
     */
    private $modelo;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"30"}})
     */
    private $marca;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     */
    private $ano;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     */
    private $cor;

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @return mixed
     */
    public function getRenavam()
    {
        return $this->renavam;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @return mixed
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @return mixed
     */
    public function getCor()
    {
        return $this->cor;
    }

    public function buildFromRequest(Params $params)
    {
        $this->placa = $params->fromPost('placa');
        $this->marca = $params->fromPost('marca');
        $this->ano = $params->fromPost('ano');
        $this->cor = $params->fromPost('cor');
        $this->modelo = $params->fromPost('modelo');
        $this->renavam = $params->fromPost('renavam');
    }

    public function toModel()
    {
        return new Veiculo(
            $this->placa,
            $this->renavam,
            $this->modelo,
            $this->marca,
            $this->ano,
            $this->cor
        );
    }
}
