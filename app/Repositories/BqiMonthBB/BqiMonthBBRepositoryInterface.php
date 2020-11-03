<?php

namespace App\Repositories\BqiMonthBB;

interface BqiMonthBBRepositoryInterface {
    public function updateOrInsertMultipleRow($data);
    public function getAll(string $field = "", string $orderBy = "asc", string $search = "", int $page = 1);
}