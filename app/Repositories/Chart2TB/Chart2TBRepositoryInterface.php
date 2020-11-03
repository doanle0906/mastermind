<?php

namespace App\Repositories\Chart2TB;

interface Chart2TBRepositoryInterface {
    public function updateOrInsertMultipleRow($data);
    public function getAllByTime($time, $banks);
    public function getListTime();
}