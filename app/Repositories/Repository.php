<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    // Model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Find the record with the given id
    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    // Get all instances of model
    public function all()
    {
        return $this->model->all();
    }

    // Get paginated instances of model
    public function paginate(int $limit)
    {
        return $this->model->paginate($limit);
    }

    // Create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Update record in the database
    public function update(array $data, int $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    // Remove record from the database
    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}