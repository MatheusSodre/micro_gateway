<?php
namespace App\Repositories\Interfaces;

 interface BaseRepositoryInterface
 {
    public function all();
    public function paginate($relations = [], $limit = null, $columns = ['*']);
    public function create(array $data);
    public function findOrFail(int $id);
    public function update(array $data, $id);
    public function delete($id);
    public function updateOrCreate(array $attributes, array $values);
    public function get(array $condition = [], bool $takeOne = true);
 }


?>
