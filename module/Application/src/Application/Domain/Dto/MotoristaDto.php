<?php

namespace Application\Domain\Dto;

use Application\Domain\Model\Motorista;
use Application\Domain\Model\Veiculo;
use Zend\Mvc\Controller\Plugin\Params;

class MotoristaDto
{
    private $nome;
    private $rg;
    private $cpf;
    private $telefone;
    private $veiculo;

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
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param string $rg
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
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
     * @return string
     */
    public function getVeiculo()
    {
        return $this->veiculo;
    }

    /**
     * @param string $veiculo
     */
    public function setVeiculo($veiculo)
    {
        $this->veiculo = $veiculo;
    }

    /**
     * @param Params $params
     */
    public function buildFromRequest(Params $params)
    {
        $this->nome = $params->fromPost('nome');
        $this->rg = $params->fromPost('rg');
        $this->cpf = $params->fromPost('cpf');
        $this->telefone = $params->fromPost('telefone');
        $this->veiculo = $params->fromPost('veiculo');
    }

    public function toModel(Veiculo $veiculo)
    {
        return new Motorista(
            $this->nome,
            $this->rg,
            $this->cpf,
            $this->telefone,
            $veiculo
        );
    }
}
