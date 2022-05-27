<?php

namespace App\Repository;

interface BaseRepositoryContract
{
    public function create();

    public function findById(int $id);

    public function update(array $values, array $where);

    public function delete(int $id, array $where = []);
}
