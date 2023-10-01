<?php

namespace App\Repositories;

use App\Interfaces\CrudRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CrudRepository
 * @package App\Repositories
 */
class CrudRepository implements CrudRepositoryInterface
{
    /**
     * @param $model
     * @param false $paginate
     * @return mixed
     */
    public function all($model, $paginate = false): mixed
    {
        return $paginate ? $model->orderBy('id', 'desc')->paginate(10) : $model->all();
    }

    /**
     * @param $model
     * @param array $data
     * @param null $selectedValue
     * @param string|null $relation
     * @return Model
     */
    public function create($model, array $data, $selectedValue = null, string $relation = null): Model
    {
        $createdModel = $model->create($data);

        if (!is_null($selectedValue)) {
            $createdModel->$relation()->attach($selectedValue);
        }

        return $createdModel;
    }

    /**
     * @param $model
     * @param array $data
     * @param $selectedValue
     * @param string $relation
     * @return Model
     */
    public function update($model, array $data, $selectedValue = null, $relation = null): Model
    {
        $model->update($data);

        if (!is_null($selectedValue)) {
            $model->$relation()->sync($selectedValue);
        }

        return $model;
    }

    /**
     * @param $model
     * @param $relation
     * @return bool
     */
    public function delete($model, $relation): bool
    {
        $model->$relation()->detach();
        return $model->delete();
    }
}
