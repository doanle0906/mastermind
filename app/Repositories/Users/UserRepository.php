<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository implements UserRepositoryInterface {
    /**
     * get model
     * @return string
     */
    public function getModel() {
        return User::class;
    }

    /**
     * get all by query
     * @param String $field
     * @param String $orderBy
     * @param String $search
     * @param Int $page
     * @return Array
     */
    public function getAll(string $field = "", string $orderBy = "asc", string $search = "", int $page = 1)
    {
        try {
            $query = $this->_model;
            $query = $query->where("role", "user");
            if (!empty($search)) {
                $query = $query->where(function ($qr) use ($search) {
                    $qr->where("name", "like", "%" . $search . "%")
                        ->orWhere("email", "like", "%" . $search . "%");
                });
            }

            if (!empty($field)) {
                $query = $query->orderBy($field, !empty($orderBy) ? $orderBy : "asc");
            } else {
                $query = $query->orderBy("id", "desc");
            }

            return $query->paginate();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function findUserByEmail($email) {
        try {
            return $this->_model->where("email", $email)->first();
        } catch (\Exception $e) {
            throw($e);
        }
    }
}