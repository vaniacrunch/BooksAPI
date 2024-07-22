<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class Repository
{
    protected $model;

    public function all(array $eager = []) : Collection
    {
        return $this->model::query()->with($eager)->get();
    }

    public function find(int $id, array $eager = []) : Model
    {
        return $this->model::query()->with($eager)->find($id);
    }

    public function paginate(int $count = 10, ?array $eager = []) : Collection
    {
        return $this->model::query()
            ->with($eager)->paginate($count);
    }

    public function store(array $data) : Model
    {
        return $this->model::query()->create($data);
    }

    public function update(int $id, array $data) : bool
    {
        return $this->model::query()->where('id', $id)->update($data);
    }

    public function destroy($id) : bool
    {
        return $this->model::destroy($id);
    }
}
