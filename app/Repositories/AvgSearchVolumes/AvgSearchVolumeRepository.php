<?php

namespace App\Repositories\AvgSearchVolumes;

use App\Models\AvgSearchVolume;
use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class AvgSearchVolumeRepository extends EloquentRepository implements AvgSearchVolumeRepositoryInterface {
    /**
     * get model
     * @return string
     */
    public function getModel() {
        return AvgSearchVolume::class;
    }

    public function updateOrInsertMultipleRow($data) {
        DB::beginTransaction();
        try {
            if (!is_array($data)) {
                throw new Exception("Data is not array!");
            }
            $queryString = 'INSERT INTO avg_search_volumes (bank_id, kws, `value`, type_data, created_at, updated_at) VALUES ';
            $queryString .= implode(',', $data);
            $queryString .= ' ON DUPLICATE KEY UPDATE ';
            $queryString .= ' value = VALUES(value), updated_at = VALUES(updated_at);';
            $pdo = DB::connection()->getPdo();
            $result = $pdo->exec($queryString);
            DB::commit();
            return $result;
        } catch (\Exception $e) {
            throw $e;
        }
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
                    $qr->where("bank_id", "like", "%" . $search . "%")
                        ->orWhere("value", $search)
                        ->orWhere("type_bank", "=", $search)
                        ->orWhere("type_value", $search)
                        ->orWhere("report_time", $search)
                        ->orWhere("created_at", $search);
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
}