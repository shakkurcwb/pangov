<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function find(int $id);

    public function all();

    public function paginate(int $limit);

    public function create(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);
}