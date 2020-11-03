<?php

namespace App\Repositories\Chart1BB;

interface Chart1BBRepositoryInterface {
    public function updateOrInsertMultipleRow($data);
    public function getListTime();
    public function getAllDataByTimeAndListBank($time, $banks);
}