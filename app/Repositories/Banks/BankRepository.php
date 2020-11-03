<?php

namespace App\Repositories\Banks;

use App\Models\Bank;
use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class BankRepository extends EloquentRepository implements BankRepositoryInterface {
    /**
     * get model
     * @return string
     */
    public function getModel() {
        return Bank::class;
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
            if (!empty($search)) {
                $query = $query->where(function ($qr) use ($search) {
                    $qr->where("id", "like", "%" . $search . "%")
                        ->orWhere("bank_name", "like", "%" . $search . "%")
                        ->orWhere("type", $search);
                });
            }

            if (!empty($field)) {
                $query = $query->orderBy($field, !empty($orderBy) ? $orderBy : "asc");
            } else {
                $query = $query->orderBy("id", "desc");
            }

            return $query->paginate();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAllData() {
        return $this->_model->all();
    }
}
