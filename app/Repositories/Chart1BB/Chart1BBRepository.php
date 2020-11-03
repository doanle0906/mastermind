<?php

namespace App\Repositories\Chart1BB;

use App\Models\Chart1BB;
use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class Chart1BBRepository extends EloquentRepository implements Chart1BBRepositoryInterface {
    /**
     * get model
     * @return string
     */
    public function getModel() {
        return Chart1BB::class;
    }

    public function updateOrInsertMultipleRow($data) {
        DB::beginTransaction();
        $queryString = "";
        try {
            if (!is_array($data) || count($data) === 0) {
                throw new Exception("Data is not array!");
            }
            $queryString = 'INSERT INTO chart1_bank_index (bank_id, report_time, `value`, created_at, updated_at) VALUES ';
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

    public function getListTime() {
        return $this->_model->select("report_time")->orderBy("report_time", "desc")->get();
    }

    public function getAllDataByTimeAndListBank($time, $banks) {
        $query = $this->_model;
        if (count($time) == 2) {
            $query = $query->whereBetween("report_time", $time);
        }
        if (count($banks) > 0) {
            $query = $query->whereIn("bank_id", $banks);
        } 
        return $query->orderBy("report_time", "asc")->orderBy("value", "desc")->get();
    }
}