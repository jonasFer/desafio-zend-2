<?php

namespace Application\Controller;

use Application\Domain\Dto\VeiculoDto;
use Application\Domain\Service\VeiculoServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VeiculoController extends AbstractActionController
{
    private $service;

    public function __construct(VeiculoServiceInterface $service)
    {
        $this->service = $service;
    }

    public function indexAction()
    {
        return new ViewModel(
            array(
                'veiculos' => $this->service->findAll()
            )
        );
    }

    public function formAction()
    {
        $id = $this->params('id');
        $veiculo = !empty($id) ? $this->service->findById($id) : null;

        return new ViewModel(
            array(
                'veiculo' => $veiculo,
                'action' => empty($veiculo) ? '/veiculo/create' : '/veiculo/edit/' . $id
            )
        );
    }

    public function createAction()
    {
        $dto = new VeiculoDto();
        $dto->buildFromRequest($this->params());

        $this->service->create($dto);
        $this->getResponse()->setStatusCode(201);
        $this->response->setContent("{}");

        return $this->response;
    }

    public function editAction()
    {
        $id = $this->params('id');
        $dto = new VeiculoDto();
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
            $this->getResponse()->setStatusCode(202);
            $this->response->setContent("{}");

            return $this->response;
        }

        $this->getResponse()->setStatusCode(404);
        $this->response->setContent("{'message': 'Parâmetro inválido'}");

        return $this->response;
    }
}