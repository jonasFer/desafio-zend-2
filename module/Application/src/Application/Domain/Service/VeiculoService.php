<?php

namespace Application\Domain\Service;

use Application\Domain\Dto\VeiculoDto;
use Application\Domain\Model\Veiculo;
use Zend\Debug\Debug;
use Zend\ServiceManager\ServiceManager;

/**
 * Class VeiculoService
 * @package Application\Domain\Service
 */
class VeiculoService implements VeiculoServiceInterface
{
    private $repository;
    private $entityManager;

    public function __construct(ServiceManager $serviceManager)
    {
        $this->entityManager = $serviceManager->get('Doctrine\ORM\EntityManager');
        $this->repository = $this->entityManager->getRepository('Application\Domain\Model\Veiculo');
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
     * @return Veiculo|null
     */
    public function findById(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param VeiculoDto $dto
     */
    public function create(VeiculoDto $dto)
    {
        $veiculo = $dto->toModel();

        $this->entityManager->persist($veiculo);
        $this->entityManager->flush();
    }

    /**
     * @param int $id
     * @param VeiculoDto $dto
     * @throws \Exception
     */
    public function edit(int $id, VeiculoDto $dto)
    {
        $veiculo = $this->repository->find($id);

        if (empty($veiculo)) {
            throw new \Exception();
        }
        $veiculo->fromDto($dto);

        $this->entityManager->persist($veiculo);
        $this->entityManager->flush();
    }

    /**
     * @param int $id
     * @throws \Exception
     */
    public function delete(int $id)
    {
        $veiculo = $this->repository->find($id);

        if (empty($veiculo)) {
            throw new \Exception();
        }

        $this->entityManager->remove($veiculo);
        $this->entityManager->flush();
    }
}
