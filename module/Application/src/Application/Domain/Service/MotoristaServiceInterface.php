<?php

namespace Application\Domain\Service;

use Application\Domain\Dto\MotoristaDto;
use Application\Domain\Model\Motorista;

/**
 * Interface MotoristaServiceInterface
 * @package Application\Domain\Service
 */
interface MotoristaServiceInterface
{
    /**
     * @return array
     */
    public function findAll();

    /**
     * @param int $id
     * @return Motorista|null
     */
    public function findById(int $id);

    /**
     * @param MotoristaDto $dto
     * @return void
     */
    public function create(MotoristaDto $dto);

    /**
     * @param int $id
     * @param MotoristaDto $dto
     * @return void
     */
    public function edit(int $id, MotoristaDto $dto);

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id);
}
