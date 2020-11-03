<?php

namespace App\Repositories\Chart3Top10;

interface Chart3Top10RepositoryInterface {
    public function updateOrInsertMultipleRow($data);
    public function getAllData($time, $banks);
    public function getListTime();
}