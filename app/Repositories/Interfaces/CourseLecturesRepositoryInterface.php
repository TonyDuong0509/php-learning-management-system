<?php

namespace App\Repositories\Interfaces;

interface CourseLecturesRepositoryInterface
{
    public function getLecturesBySectionId($id);
    public function getLectureBySectionId($id);
    public function fetchAll($condition = null);
    public function save($params);
    public function getById($id);
    public function update($category);
    public function delete($id);
}
