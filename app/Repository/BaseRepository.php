<?php

namespace App\Repository;

abstract class BaseRepository implements BaseRepositoryContract
{

    protected $model;

    public function create() {

        return $this->model->save();

    }

    public function findById(int $id) {

        return $this->model->find($id);

    }

    public function update(array $values = [], array $where = []) {

        return $this->model->save();

    }

    public function delete(int $id, array $where = []) {

        if ($record = $this->findById($id)) {
            return $record->delete();
        }

        throw new \Exception('Registro não encontrado para exclusão');
    }

}
