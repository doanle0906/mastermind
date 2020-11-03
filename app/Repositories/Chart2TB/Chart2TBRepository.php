<?php

namespace App\Repositories\Chart2TB;

use App\Models\Chart2TB;
use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class Chart2TBRepository extends EloquentRepository implements Chart2TBRepositoryInterface {
    /**
     * get model
     * @return string
     */
    public function getModel() {
        return Chart2TB::class;
    }

    public function updateOrInsertMultipleRow($data) {
        DB::beginTransaction();
        try {
            if (!is_array($data)) {
                throw new Exception("Data is not array!");
            }
            $queryString = 'INSERT INTO chart2_tb (bank_id, value_bqi, report_time, value_care, value_compared_to_1, value_compared_to_3, created_at, updated_at) VALUES ';
            $queryString .= implode(',', $data);
            $queryString .= ' ON DUPLICATE KEY UPDATE ';
            $queryString .= ' value_bqi = VALUES(value_bqi), value_care = VALUES(value_care), value_compared_to_1 = VALUES(value_compared_to_1), value_compared_to_3 = VALUES(value_compared_to_3), updated_at = VALUES(updated_at);';
            $pdo = DB::connection()->getPdo();
            $result = $pdo->exec($queryString);
            DB::commit();
            return $result;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getAllByTime($time, $banks) {
        $query = $this->_model->with("bank")->where("report_time", $time);
        if (count($banks) > 0) {
            $query = $query->whereIn("bank_id", $banks);
        } 
        return $query->orderBy("value_care", "desc")->get();
    }

    public function getListTime() {
        return $this->_model->select("report_time")->orderBy("report_time", "desc")->get();
    }
}