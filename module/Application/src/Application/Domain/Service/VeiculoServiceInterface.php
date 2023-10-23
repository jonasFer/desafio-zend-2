<?php

namespace Application\Domain\Service;

use Application\Domain\Dto\VeiculoDto;
use Application\Domain\Model\Veiculo;

interface VeiculoServiceInterface
{
    /**
     * @return array
     */
    public function findAll();

    /**
     * @param VeiculoDto $dto
     * @return void
     */
    public function create(VeiculoDto $dto);

    /**
     * @param int $id
     * @param VeiculoDto $dto
     * @return void
     */
    public function edit(int $id, VeiculoDto $dto);

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id);

    /**
     * @param int $id
     * @return Veiculo|null
     */
    public function findById(int $id);
}