<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all() { return $this->model->all(); }

    public function find($id) { return $this->model->findOrFail($id); }

    public function create(array $attributes) { return $this->model->create($attributes); }

    public function update($id, array $attributes)
    {
        $record = $this->find($id);
        $record->update($attributes);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->find($id);
        return $record->delete();
    }
}
