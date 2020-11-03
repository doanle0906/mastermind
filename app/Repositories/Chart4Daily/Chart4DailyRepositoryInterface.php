<?php

namespace App\Repositories\Chart4Daily;

interface Chart4DailyRepositoryInterface {
    public function updateOrInsertMultipleRow($data);
    public function getAllByTime($time, $banks);
    public function getListTime();
}