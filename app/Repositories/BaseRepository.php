<?php

namespace App\Repositories;

use App\Enums\Status;

class BaseRepository
{
    public function query()
    {
        return $this->model->query();
    }

    public function create(array $inputs)
    {
        return $this->model->create($inputs);
    }

    public function first_or_create($inputs, $updates = [])
    {
        return $this->model->firstOrCreate($inputs, $updates);
    }

    public function update($model, array $inputs)
    {
        $model->update($inputs);
        return $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function listing()
    {
        return $this->model
            ->where($this->model::STATUS, Status::ACTIVE)
            ->orderBy($this->model::NAME, $this->model::ASC)
            ->pluck($this->model::NAME, $this->model::ID);
    }

}
