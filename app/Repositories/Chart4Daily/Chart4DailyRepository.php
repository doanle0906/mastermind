<?php

namespace App\Repositories\Chart4Daily;

use App\Models\Chart4Daily;
use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class Chart4DailyRepository extends EloquentRepository implements Chart4DailyRepositoryInterface {
    /**
     * get model
     * @return string
     */
    public function getModel() {
        return Chart4Daily::class;
    }

    public function updateOrInsertMultipleRow($data) {
        DB::beginTransaction();
        try {
            if (!is_array($data)) {
                throw new Exception("Data is not array!");
            }
            $queryString = 'INSERT INTO chart4_daily (bank_id, `value`, report_time, created_at, updated_at) VALUES ';
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

    public function getAllByTime($time, $banks) {
        $query = $this->_model->where("report_time", $time);
        if (count($banks) > 0) {
            $query = $query->whereIn("bank_id", $banks);
        } 
        return $query->orderBy("value", "desc")->get();
    }

    public function getListTime() {
        return $this->_model->select("report_time")->orderBy("report_time", "desc")->get();
    }
}