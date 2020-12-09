<?php
/**
 * Created by PhpStorm.
 * User: monica
 * Date: 01/10/19
 * Time: 18:20
 */

namespace App\Repositories;

use App\Repositories\Contracts\GenericRepositoryInterface;
use Illuminate\Support\Str;

abstract class AbstractGenericRepository implements GenericRepositoryInterface
{
    protected $model;

    /**
     * AbstractGenericRepository constructor.
     *
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function store(array $attributes)
    {
        $this->model->create($attributes);
    }

    /**
     * @param $instanceId
     * @param array $attributes
     * @return mixed
     */
    public function update($instanceId, array $attributes)
    {
        return $this->model->update(['id' => $instanceId], $attributes);
    }

    /**
     * @param $id
     * @return boolean
     */
    public function delete($id)
    {
        $this->model->id = $id;
        return $this->model->delete();
    }

    public function createMany(array $attributes)
    {
        $this->model->createMany($attributes);
    }

    public function all()
    {
        return $this->model->allWhere();
    }

    public function findById($id)
    {
        return $this->model->findById($id);
    }
}
