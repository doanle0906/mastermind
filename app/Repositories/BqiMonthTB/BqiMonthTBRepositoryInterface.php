<?php

namespace App\Repositories\BqiMonthTB;

interface BqiMonthTBRepositoryInterface {
    public function updateOrInsertMultipleRow($data);
    public function getAll(string $field = "", string $orderBy = "asc", string $search = "", int $page = 1);
}