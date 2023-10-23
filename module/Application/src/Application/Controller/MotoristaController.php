<?php

namespace Application\Controller;

use Application\Domain\Dto\MotoristaDto;
use Application\Domain\Service\MotoristaServiceInterface;
use Application\Domain\Service\VeiculoServiceInterface;
use Zend\Debug\Debug;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MotoristaController extends AbstractActionController
{
    private $service;
    private $veiculoService;

    public function __construct(
        MotoristaServiceInterface $service,
        VeiculoServiceInterface $veiculoService
    ) {
        $this->service = $service;
        $this->veiculoService = $veiculoService;
    }

    public function indexAction()
    {
        return new ViewModel(
            array(
                'motoristas' => $this->service->findAll()
            )
        );
    }

    public function formAction()
    {
        $id = $this->params('id');
        $motorista = !empty($id) ? $this->service->findById($id) : null;

        return new ViewModel(
            array(
                'motorista' => $motorista,
                'action' => empty($motorista) ? '/motorista/create' : '/motorista/edit/' . $id,
                'veiculos' => $this->veiculoService->findAll()
            )
        );
    }

    public function createAction()
    {
        $dto = new MotoristaDto();
        $dto->buildFromRequest($this->params());

        $this->service->create($dto);
        $this->getResponse()->setStatusCode(201);
        $this->response->setContent("{}");

        return $this->response;
    }

    public function editAction()
    {
        $id = $this->params('id');
        $dto = new MotoristaDto();
        $dto->buildFromRequest($this->params());

        $this->service->edit($id, $dto);
        $this->getResponse()->setStatusCode(200);
        $this->response->setContent("{}");

        return $this->response;
    }


    public function deleteAction()
    {
        $id = $this->params('id');
        if (!empty($id)) {
            $this->service->delete($id);
            $this->response->setContent("{}");
            $this->getResponse()->setStatusCode(202);

            return $this->response;
        }

        $this->getResponse()->setStatusCode(404);
        $this->response->setContent("{'message': 'Parâmetro inválido'}");

        return $this->response;
    }
}