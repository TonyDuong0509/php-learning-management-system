<?php

namespace App\Repositories\Interfaces;

interface CourseRepositoryInterface
{
    public function fetchAll($condition = null);
    public function save($params);
    public function getById($id);
    public function update($category);
    public function delete($id);
}
