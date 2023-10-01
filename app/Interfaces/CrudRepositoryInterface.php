<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface CrudRepositoryInterface
 * @package App\Interfaces
 */
interface CrudRepositoryInterface
{
    /**
     * @param $model
     * @param false $paginate
     * @return mixed
     */
    public function all($model, $paginate = false): mixed;

    /**
     * @param $model
     * @param array $data
     * @param null $selectedValue
     * @param string|null $relation
     * @return Model
     */
    public function create($model, array $data, $selectedValue = null, string $relation = null): Model;

    /**
     * @param $model
     * @param array $data
     * @param null $selectedValue
     * @param string|null $relation
     * @return Model
     */
    public function update($model, array $data, $selectedValue = null, string $relation = null): Model;

    /**
     * @param $model
     * @param $relation
     * @return bool
     */
    public function delete($model, $relation): bool;
}