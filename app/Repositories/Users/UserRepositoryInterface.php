<?php

namespace App\Repositories\Users;

interface UserRepositoryInterface {
    public function findUserByEmail($email);
    public function getAll(string $field = "", string $orderBy = "asc", string $search = "", int $page = 1);
}