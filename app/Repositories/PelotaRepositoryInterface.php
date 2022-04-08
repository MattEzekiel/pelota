<?php

namespace App\Repositories;

interface PelotaRepositoryInterface
{
    /**
     * @param array $searchParams
     */
    public function all($searchParams = []);

    /**
     * @param int $pk
     */
    public function getByPk($pk);

    /**
     * @param array $data
     */
    public function create($data = []);

    /**
     * @param int $pk
     * @param array $data
     * @return mixed
     */
    public function update($pk, $data = []);

    /**
     * @param int $pk
     * @return mixed
     */
    public function delete($pk);
}
