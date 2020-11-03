<?php

namespace App\Repositories\Contracts;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface IBaseRepository
 * @package App\Repositories
 */
interface IBaseRepository
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param $id
     * @return bool|null
     */
    public function update(array $data, int $id): ?bool;

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);
}
