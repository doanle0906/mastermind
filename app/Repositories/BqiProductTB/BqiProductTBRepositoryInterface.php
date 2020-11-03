<?php

namespace App\Repositories\BqiProductTB;

interface BqiProductTBRepositoryInterface {
    public function updateOrInsertMultipleRow($data);
    public function getAll(string $field = "", string $orderBy = "asc", string $search = "", int $page = 1);
}