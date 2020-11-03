<?php

namespace App\Repositories\AvgSearchVolumes;

interface AvgSearchVolumeRepositoryInterface {
    public function updateOrInsertMultipleRow($data);
    public function getAll(string $field = "", string $orderBy = "asc", string $search = "", int $page = 1);
}