<?php
/**
 * Created by PhpStorm.
 * User: monica
 * Date: 07/12/20
 * Time: 06:56 م
 */

namespace App\Repositories\Contracts;


interface GenericRepositoryInterface
{
    public function store(array $attributes);
    public function delete($id);
    public function all();
    public function update($instanceId, array $attributes);
    public function createMany(array $attributes);
    public function findById($id);
}