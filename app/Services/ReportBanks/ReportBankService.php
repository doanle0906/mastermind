<?php

namespace App\Services\ReportBanks;

use App\Repositories\AvgSearchs\AvgSearchRepositoryInterface;
use App\Repositories\AvgSearchVolumes\AvgSearchVolumeRepositoryInterface;
use App\Repositories\BqiMonthBB\BqiMonthBBRepositoryInterface;
use App\Repositories\BqiMonthTB\BqiMonthTBRepositoryInterface;
use App\Repositories\BqiProductBB\BqiProductBBRepositoryInterface;
use App\Repositories\BqiProductTB\BqiProductTBRepositoryInterface;
use App\Repositories\Chart1BB\Chart1BBRepositoryInterface;
use App\Repositories\Chart2TB\Chart2TBRepositoryInterface;
use App\Repositories\Chart3Top10\Chart3Top10RepositoryInterface;
use App\Repositories\Chart4Daily\Chart4DailyRepositoryInterface;
use Exception;
use Illuminate\Support\Carbon;

class ReportBankService implements ReportBankServiceInterface {

    protected $avgSearchRepo;
    protected $avgSearchVolumeRepo;
    protected $bqiMonthBBRepo;
    protected $bqiMonthTBRepo;
    protected $bqiProductBBRepo;
    protected $bqiProductTTRepo;
    protected $chart1BBRepo;
    protected $chart2TBRepo;
    protected $chart3Top10Repo;
    protected $chart4DailyRepo;

    public function __construct(
        AvgSearchRepositoryInterface $avgSearchRepo, 
        AvgSearchVolumeRepositoryInterface $avgSearchVolumeRepo,
        BqiMonthBBRepositoryInterface $bqiMonthBBRepo,
        BqiMonthTBRepositoryInterface $bqiMonthTBRepo,
        BqiProductBBRepositoryInterface $bqiProductBBRepo,
        BqiProductTBRepositoryInterface $bqiProductTTRepo,
        Chart1BBRepositoryInterface $chart1BBRepo,
        Chart2TBRepositoryInterface $chart2TBRepo,
        Chart3Top10RepositoryInterface $chart3Top10Repo,
        Chart4DailyRepositoryInterface $chart4DailyRepo
    )
    {
        $this->avgSearchRepo = $avgSearchRepo;
        $this->avgSearchVolumeRepo = $avgSearchVolumeRepo;
        $this->bqiMonthBBRepo = $bqiMonthBBRepo;
        $this->bqiMonthTBRepo = $bqiMonthTBRepo;
        $this->bqiProductBBRepo = $bqiProductBBRepo;
        $this->bqiProductTTRepo = $bqiProductTTRepo;
        $this->chart1BBRepo = $chart1BBRepo;
        $this->chart2TBRepo = $chart2TBRepo;
        $this->chart3Top10Repo = $chart3Top10Repo;
        $this->chart4DailyRepo = $chart4DailyRepo;
    }

    /**
     * get all white list
     * @param array $query
     */
    public function all(array $request = []) {
        try {
            $request = (object) $request;
            $field = empty($request->field) ? "" : $request->field;
            $orderBy = empty($request->orderBy) ? "" : $request->orderBy;
            $search = empty($request->search) ? "" : $request->search;
            $page = empty($request->page) ? 1 : (int) $request->page;
            $result = $this->reportBankRepo->getAll($field, $orderBy, $search, $page);

            $data = (object)[
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            ];

            if (!empty($result)) {
                $result = (object) $result->toArray();
                $data->recordsTotal = $result->total;
                $data->recordsFiltered = $result->total;
                $data->data = $result->data;
            }

            return $data;
        } catch (Exception $e) {
            return (object)[
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            ];
        }
    }

    public function getDataChart2($time, $banks) {
        return $this->chart2TBRepo->getAllByTime($time, $banks);
    }

    public function getListTimeChart2() {
        return $this->chart2TBRepo->getListTime();
    }

    public function getDataChart4($time, $banks) {
        return $this->chart4DailyRepo->getAllByTime($time, $banks);
    }

    public function getListTimeChart4() {
        return $this->chart4DailyRepo->getListTime();
    }

    public function getListTimeChart3() {
        return $this->chart3Top10Repo->getListTime();
    }

    public function getListTimeChart1() {
        return $this->chart1BBRepo->getListTime();
    }

    public function getDataChart1($time, $banks) {
        return $this->chart1BBRepo->getAllDataByTimeAndListBank($time, $banks);
    }

    public function getDataChart3($time, $banks) {
        return $this->chart3Top10Repo->getAllData($time, $banks);
    }

    /**
     * upload report
     * @param array 
     * @return boolean
     */
    public function importExcel($data) {
        $nameSheet = "";
        try {
            $total = 0;
            foreach($data as $index => $sheet) {
                switch($index) {
                    case "final_bqi_5b_bb":
                        $nameSheet = "final_bqi_5b_bb";
                        $total += $this->importDataSheetBQIBB($sheet, "bqi_5b_bb");
                        break;
                    case "final_bqi_5b_tb":
                        $nameSheet = "final_bqi_5b_tb";
                        $total += $this->importDataSheetBQITB($sheet, "bqi_5b_tb");
                        break;
                    case "final_bqi_local_bb":
                        $nameSheet = "final_bqi_local_bb";
                        $total += $this->importDataSheetBQIBB($sheet, "bqi_local_bb");
                        break;
                    case "final_bqi_local_tb":
                        $nameSheet = "final_bqi_local_tb";
                        $total += $this->importDataSheetBQITB($sheet, "bqi_local_tb");
                        break;
                    case "final_bqi_global_bb":
                        $nameSheet = "final_bqi_global_bb";
                        $total += $this->importDataSheetBQIBB($sheet, "bqi_global_bb");
                        break;
                    case "final_bqi_global_tb":
                        $nameSheet = "final_bqi_global_tb";
                        $total += $this->importDataSheetBQITB($sheet, "bqi_global_tb");
                        break;
                    case "final_bqi_month_local_bb":
                        $nameSheet = "final_bqi_month_local_bb";
                        $total += $this->importDataSheetBqiMonthBB($sheet, "LOCAL");
                        break;

                    case "final_bqi_month_local_tb":
                        $nameSheet = "final_bqi_month_local_tb";
                        $total += $this->importDataSheetBqiMonthTB($sheet, "LOCAL");
                        break;

                    case "final_bqi_month_global_bb":
                        $nameSheet = "final_bqi_month_global_bb";
                        $total += $this->importDataSheetBqiMonthBB($sheet, "GLOBAL");
                        break;

                    case "final_bqi_month_global_tb":
                        $nameSheet = "final_bqi_month_global_tb";
                        $total += $this->importDataSheetBqiMonthTB($sheet, "GLOBAL");
                        break;

                    case "final_bqi_products_bb":
                        $nameSheet = "final_bqi_products_bb";
                        $total += $this->importDatSheetBqiProductBB($sheet);
                        break;

                    case "final_bqi_product_local_tb":
                        $nameSheet = "final_bqi_product_local_tb";
                        $total += $this->importDataSheetBqiProductTB($sheet);
                        break;

                    case "chart1_bank_index":
                        $nameSheet = "chart1_bank_index";
                        $total += $this->importDataSheetChart1BB($sheet);
                        break;

                    case "chart2_tb":
                        $nameSheet = "chart2_tb";
                        $total += $this->importDataSheetChart2TB($sheet);
                        break;

                    case "chart3_top10":
                        $nameSheet = "chart3_top10";
                        $total += $this->importDataSheetChart3Top10($sheet);
                        break;

                    case "chart4_daily":
                        $nameSheet = "chart4_daily";
                        $total += $this->importDataSheetChart4Daily($sheet);
                        break;

                    default:
                        // $total += $this->importDataSheetBqiProductTB($sheet);
                        break;
                }
            }
            return $total;
        } catch (\Exception $e) {
            throw new Exception("Import data error, please check your excel sheet " . $nameSheet);
        }
    }

    private function importDataSheetBQIBB($rows, $type_value) {
        try {
            $total = 0;
            
            foreach ($rows as $index => $row) 
            {
                $insertData = [];
                if ($row[1] == "") break;
                if ($index === 0) continue;
                
                foreach($rows[0] as $indexHeader => $item) {
                    if ($indexHeader === 0 || $indexHeader === 1) continue;

                    if (empty($row[$indexHeader])) break;

                    $data = [
                        $row[1],
                        $item,
                        $this->fomatDataValue($row[$indexHeader]),
                        $type_value,
                        Carbon::now()->toDateTimeString(),
                        Carbon::now()->toDateTimeString()
                    ];
                    
                    array_push($insertData, '("' . implode('","', $data) . '")');
                }
                $total += $this->avgSearchRepo->updateOrInsertMultipleRow($insertData);
            }
            return $total;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function importDataSheetBQITB($rows, $type_value) {
        try {
            $total = 0;
            $insertData = [];
            foreach ($rows as $index => $row) 
            {
                if ((string)$row[1] == "") break;
                if ($index === 0) continue;
                
                $data = [
                    $row[1],
                    $row[2],
                    $this->fomatDataValue($row[3]),
                    $type_value,
                    Carbon::now()->toDateTimeString(),
                    Carbon::now()->toDateTimeString()
                ];
                
                array_push($insertData, '("' . implode('","', $data) . '")');
                
            }

            $total += $this->avgSearchVolumeRepo->updateOrInsertMultipleRow($insertData);
            return $total;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function importDataSheetBqiMonthBB($rows, $type_value) {
        try {
            $total = 0;
            foreach ($rows as $index => $row) 
            {
                $insertData = [];
                if ((string)$row[1] == "") break;
                if ($index === 0) continue;

                foreach($rows[0] as $indexHeader => $item) {
                    if ($indexHeader === 0) continue;

                    if (empty($row[$indexHeader])) break;

                    $time = $this->formatTime($row[0]);
                    if ($time == null) {
                        throw new Exception("Data format time incorrect");
                    }

                    $data = [
                        $item,
                        $type_value,
                        $this->fomatDataValue($row[$indexHeader]),
                        $time,
                        Carbon::now()->toDateTimeString(),
                        Carbon::now()->toDateTimeString()
                    ];
                    
                    array_push($insertData, '("' . implode('","', $data) . '")');
                }
                $total += $this->bqiMonthBBRepo->updateOrInsertMultipleRow($insertData);
            }
            return $total;
        } catch (\Exception $e) {
            throw($e);
        } 
    }

    private function importDataSheetBqiMonthTB($rows, $type_value) {
        try {
            $total = 0;
            foreach ($rows as $index => $row) 
            {
                $insertData = [];
                if ((string)$row[1] == "") break;
                if ($index === 0) continue;

                foreach($row as $indexRow => $item) {
                    if ($indexRow <= 2) continue;

                    if (empty($rows[0][$indexRow])) break;

                    $time = $this->formatTime($rows[0][$indexRow]);
                    if ($time == null) {
                        throw new Exception("Data format time incorrect");
                    }

                    $data = [
                        $row[1],
                        $row[2],
                        $type_value,
                        $this->fomatDataValue($item),
                        $time,
                        Carbon::now()->toDateTimeString(),
                        Carbon::now()->toDateTimeString()
                    ];
                    
                    array_push($insertData, '("' . implode('","', $data) . '")');
                }
                $total += $this->bqiMonthTBRepo->updateOrInsertMultipleRow($insertData);
            }
            return $total;
        } catch (\Exception $e) {
            throw($e);
        } 
    }

    private function importDatSheetBqiProductBB($rows) {
        try {
            $total = 0;
            foreach ($rows as $index => $row) 
            {
                $insertData = [];
                if ((string)$row[1] == "") break;
                if ($index === 0) continue;

                foreach($rows[0] as $indexHeader => $item) {
                    if ($indexHeader <= 1) continue;

                    if (empty($item)) break;

                    $data = [
                        $item,
                        $row[1],
                        $this->fomatDataValue($row[$indexHeader]),
                        Carbon::now()->toDateTimeString(),
                        Carbon::now()->toDateTimeString()
                    ];
                    
                    array_push($insertData, '("' . implode('","', $data) . '")');
                }
                $total += $this->bqiProductBBRepo->updateOrInsertMultipleRow($insertData);
            }
            return $total;
        } catch (\Exception $e) {
            throw($e);
        } 
    }

    private function importDataSheetBqiProductTB($rows) {
        try {
            $total = 0;
            $type_product = "";
            foreach ($rows as $index => $row) 
            {
                $insertData = [];
                if ((string)$row[2] == "") break;
                if ($index === 0) continue;
                
                if ($row[1] != null) {
                    $type_product = $row[1];
                }

                foreach($row as $indexRow => $item) {
                    if ($indexRow <= 2) continue;

                    if (empty($rows[0][$indexRow])) break;

                    $time = $this->formatTime($rows[0][$indexRow]);
                    if ($time == null) {
                        throw new Exception("Data format time incorrect");
                    }

                    $data = [
                        $type_product,
                        $row[2],
                        $this->fomatDataValue($item),
                        $time,
                        Carbon::now()->toDateTimeString(),
                        Carbon::now()->toDateTimeString()
                    ];
                    
                    array_push($insertData, '("' . implode('","', $data) . '")');
                }
                $total += $this->bqiProductTTRepo->updateOrInsertMultipleRow($insertData);
            }
            return $total;
        } catch (\Exception $e) {
            throw($e);
        } 
    }

    private function importDataSheetChart1BB($rows) {
        try {
            $total = 0;
            foreach ($rows as $index => $row) {
                if ((string)$row[1] == "") break;
                if ($index === 0) continue;
                $insertData = [];

                foreach($row as $indexRow => $item) {
                   
                    if ($indexRow <= 1) continue;
                    if ((string) $item == "") break;
                    
                    $data = [
                        $row[1],
                        $this->formatTime($rows[0][$indexRow]),
                        $item,
                        Carbon::now()->toDateTimeString(),
                        Carbon::now()->toDateTimeString()
                    ];
                    
                    array_push($insertData, '("' . implode('","', $data) . '")');
                }

                
                $total += $this->chart1BBRepo->updateOrInsertMultipleRow($insertData);
            }
            return $total;
        } catch (\Exception $e) {
            throw($e);
        }
    }

    private function importDataSheetChart2TB($rows) {
        try {
            $total = 0;
            $insertData = [];
            foreach ($rows as $index => $row) {
                if ((string)$row[1] == "") break;
                if ($index === 0) continue;

                $data = [
                    $row[1],
                    $this->fomatDataValue($row[2]),
                    $this->formatTime($row[3]),
                    $this->fomatDataValue($row[4]),
                    $this->fomatDataValue($row[5]),
                    $this->fomatDataValue($row[6]),
                    Carbon::now()->toDateTimeString(),
                    Carbon::now()->toDateTimeString()
                ];
                array_push($insertData, '("' . implode('","', $data) . '")');
            }
            $total += $this->chart2TBRepo->updateOrInsertMultipleRow($insertData);
            return $total;
        } catch (\Exception $e) {
            throw($e);
        }
    }

    private function importDataSheetChart3Top10($rows) {
        try {
            $total = 0;
            $insertData = [];
            foreach ($rows as $index => $row) {
                if ((string)$row[1] == "") break;
                if ($index === 0) continue;
                $arrKind = explode("_", $row[1]);

                $data = [
                    $arrKind[0],
                    $arrKind[1],
                    $this->formatTime($row[2]),
                    $row[3],
                    $this->fomatDataValue($row[4]),
                    Carbon::now()->toDateTimeString(),
                    Carbon::now()->toDateTimeString()
                ];
                array_push($insertData, '("' . implode('","', $data) . '")');
            }
            $total += $this->chart3Top10Repo->updateOrInsertMultipleRow($insertData);
            return $total;
        } catch (\Exception $e) {
            throw($e);
        }
    }

    private function importDataSheetChart4Daily($rows) {
        try {
            $total = 0;
            foreach ($rows as $index => $row) 
            {
                $insertData = [];
                if ((string)$row[2] == "") break;
                if ($index === 0) continue;

                foreach($row as $indexRow => $item) {
                    if ($indexRow <= 1) continue;

                    if (empty($rows[0][$indexRow])) break;

                    $arrTime = explode("/", $rows[0][$indexRow]);
                    if (count($arrTime) != 3) {
                        throw new Exception("Data format time incorrect");
                    }

                    $time = Carbon::create(trim($arrTime[2]), trim($arrTime[1]), trim($arrTime[0]))->format('Y-m-d');
                    $data = [
                        $row[1],
                        $this->fomatDataValue($item),
                        $time,
                        Carbon::now()->toDateTimeString(),
                        Carbon::now()->toDateTimeString()
                    ];
                    array_push($insertData, '("' . implode('","', $data) . '")');
                }
                $total += $this->chart4DailyRepo->updateOrInsertMultipleRow($insertData);
            }
            return $total;
        } catch (\Exception $e) {
            throw($e);
        }
    }

    public function formatTime($timeString) {
        if (strpos($timeString, 't') == 0) {
            $timeString = str_replace('t', '', $timeString);
        }

        if (strpos($timeString, "_") == false) {
            return null;
        } 

        $arrTime = explode("_", $timeString);
        return Carbon::create($arrTime[1], $arrTime[0], 1)->format('Y-m-d');
    }

    public function fomatDataValue($value) {
        $value = str_replace(",", "", $value);
        $value = floatval($value);
        $value = round($value, 2);
        return $value;
    }
}