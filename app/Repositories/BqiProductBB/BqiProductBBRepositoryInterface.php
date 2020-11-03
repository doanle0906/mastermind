<?php

namespace App\Repositories\BqiProductBB;

interface BqiProductBBRepositoryInterface {
    public function updateOrInsertMultipleRow($data);
    public function getAll(string $field = "", string $orderBy = "asc", string $search = "", int $page = 1);
}