<?php

namespace App\Repositories\Chart3Top10;

use App\Models\Chart3Top10;
use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class Chart3Top10Repository extends EloquentRepository implements Chart3Top10RepositoryInterface {
    /**
     * get model
     * @return string
     */
    public function getModel() {
        return Chart3Top10::class;
    }

    public function updateOrInsertMultipleRow($data) {
        DB::beginTransaction();
        try {
            if (!is_array($data)) {
                throw new Exception("Data is not array!");
            }
            $queryString = 'INSERT INTO chart3_top10 (bank_id, kind, report_time, kws, volumn_search, created_at, updated_at) VALUES ';
            $queryString .= implode(',', $data);
            $queryString .= ' ON DUPLICATE KEY UPDATE ';
            $queryString .= ' volumn_search = VALUES(volumn_search), updated_at = VALUES(updated_at);';
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

    public function getAllData($time, $banks) { 
        $query = $this->_model->where("report_time", $time);
        if (count($banks) > 0) {
            $query = $query->whereIn("bank_id", $banks);
        } 
        return $query->orderBy("volumn_search", "desc")->get();
    }
}