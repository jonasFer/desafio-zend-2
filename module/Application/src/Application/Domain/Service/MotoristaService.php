<?php

namespace Application\Domain\Service;

use Application\Domain\Dto\MotoristaDto;
use Application\Domain\Model\Motorista;
use Zend\ServiceManager\ServiceManager;

class MotoristaService implements MotoristaServiceInterface
{
    private $repository;
    private $entityManager;
    private $veiculoService;

    public function __construct(ServiceManager $serviceManager)
    {
        $this->entityManager = $serviceManager->get('Doctrine\ORM\EntityManager');
        $this->repository = $this->entityManager->getRepository('Application\Domain\Model\Motorista');
        $this->veiculoService = $serviceManager->get('Application\Domain\Service\VeiculoServiceInterface');
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @param int $id
     * @return Motorista|null
     */
    public function findById(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param MotoristaDto $dto
     * @throws \Exception
     */
    public function create(MotoristaDto $dto)
    {
        $veiculo = $this->veiculoService->findById($dto->getVeiculo());

        if (empty($veiculo)) {
            throw new \Exception();
        }

        $motorista = $dto->toModel($veiculo);

        $this->entityManager->persist($motorista);
        $this->entityManager->flush();
    }

    /**
     * @param int $id
     * @param MotoristaDto $dto
     * @throws \Exception
     */
    public function edit(int $id, MotoristaDto $dto)
    {
        $motorista = $this->repository->find($id);
        $veiculo = $this->veiculoService->findById($dto->getVeiculo());

        if (empty($veiculo)) {
            throw new \Exception();
        }

        if (empty($motorista)) {
            throw new \Exception();
        }

        $motorista->fromDto($dto, $veiculo);

        $this->entityManager->persist($motorista);
        $this->entityManager->flush();
    }

    /**
     * @param int $id
     * @throws \Exception
     */
    public function delete(int $id)
    {
        $motorista = $this->repository->find($id);

        if (empty($motorista)) {
            throw new \Exception();
        }

        $this->entityManager->remove($motorista);
        $this->entityManager->flush();
    }
}