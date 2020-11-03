<?php

namespace App\Repositories\Banks;

interface BankRepositoryInterface {
    public function getAll(string $field = "", string $orderBy = "asc", string $search = "", int $page = 1);
    public function getAllData();
}