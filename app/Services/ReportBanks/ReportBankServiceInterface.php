<?php

namespace App\Services\ReportBanks;

interface ReportBankServiceInterface {
    /**
     * login user
     */
    public function importExcel($data);
    public function getDataChart2($time, $banks);
    public function getListTimeChart2();
    public function getDataChart4($time, $banks);
    public function getListTimeChart4();
    public function getListTimeChart1();
    public function getListTimeChart3();
    public function getDataChart1($time, $banks);
    public function getDataChart3($time, $banks);
}