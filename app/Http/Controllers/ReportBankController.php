<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileImportRequest;
use App\Imports\LocalIndexSheetImport;
use App\Imports\ReportBanksImport;
use App\Services\ReportBanks\ReportBankServiceInterface;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;

class ReportBankController extends Controller
{
    protected $reportBankService;

    public function __construct(ReportBankServiceInterface $reportBankService)
    {
        $this->reportBankService = $reportBankService;
    }

    public function viewListReportBank() {
        return view("admin.pages.banks.list");
    }

    public function viewImportReportBank() {
        return view("admin.pages.banks.import");
    }

    public function import() 
    {
        $import = new ReportBanksImport();
        $filename = public_path() . Config::get('constants.PATH_FILE_REPORT_BANK') . "chart.xlsx";
        $import->onlySheets(
            // 'final_bqi_5b_bb', 
            // 'final_bqi_5b_tb', 
            // 'final_bqi_local_bb',
            // 'final_bqi_local_tb',
            // 'final_bqi_global_bb',
            // 'final_bqi_global_tb',
            // 'final_bqi_month_local_bb',
            // 'final_bqi_month_local_tb',
            // 'final_bqi_month_global_bb',
            // 'final_bqi_month_global_tb',
            // 'final_bqi_products_bb',
            // 'final_bqi_product_local_tb',
            "chart1_bank_index",
            // "chart2_tb",
            // "chart3_top10",
            // "chart4_daily"
        );
        $result = Excel::toCollection($import, $filename);
        // dd($result);
        $result = $this->reportBankService->importExcel($result);
        dd($result);
        return redirect('/')->with('success', 'All good!');
    }

    public function importReport(FileImportRequest $request) {
        try {
            $file = $request->file("file");
            $type = $request->get("type", "bqi");
            $import = new ReportBanksImport();
            if ($type === "bqi") {
                $import->onlySheets(
                    'final_bqi_5b_bb', 
                    // 'final_bqi_5b_tb',
                    'final_bqi_local_bb',
                    // 'final_bqi_local_tb', 
                    'final_bqi_global_bb',
                    // 'final_bqi_global_tb',
                    'final_bqi_month_local_bb',
                    // 'final_bqi_month_local_tb',
                    'final_bqi_month_global_bb',
                    // 'final_bqi_month_global_tb',
                    'final_bqi_products_bb'
                    // 'final_bqi_product_local_tb',
                );
            } else {
                $import->onlySheets(
                    "chart1_bank_index",
                    "chart2_tb",
                    "chart3_top10",
                    "chart4_daily"
                );
            }
            $result = Excel::toCollection($import, $file);
            $total = $this->reportBankService->importExcel($result);
            if ($total > 0) {
                return response()->json(["message" => "Import data success!"], 200);
            }
            
            return response()->json(["message" => "Import data error. please check your excel file."], 400);
        } catch (\Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function getDataReportBank(Request $request) {
        $input = $request->all();
        // $result = $this->reportBankService->all($input);
        // return response()->json($result, 200);
    }

    public function getDataChart2(Request $request) {
        try {
            $time = $request->get("time", Carbon::now()->toDateString());
            $time = Carbon::parse($time)->startOfMonth()->toDateString();
            $banks = $request->get("banks", "");
            $banks = (!empty($banks) && $banks != "") ? explode(",", $banks) : [];
            $listBankDefault = Config::get("constants.LIST_BANK_DEFAULT");
            $banks = array_merge($listBankDefault, $banks);
            $result = $this->reportBankService->getDataChart2($time, $banks);
            $data = (object)[
                "recordsTotal" => $result->count(),
                "recordsFiltered" => $result->count(),
                "data" => $result->toArray()
            ];
            return response()->json($data, 200);
        } catch (\Exception $e) {
            $data = (object)[
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            ];
            return response()->json($data, 200);
        }
    }

    public function getDataChart4(Request $request) {
        try {
            $time = $request->get("time", Carbon::now());
            $time = Carbon::parse($time)->toDateString();
            $banks = $request->get("banks", "");
            $banks = (!empty($banks) && $banks != "") ? explode(",", $banks) : [];
            $listBankDefault = Config::get("constants.LIST_BANK_DEFAULT");
            $banks = array_merge($listBankDefault, $banks);
            $result = $this->reportBankService->getDataChart4($time, $banks);
            return response()->json((object) ["datasets" => $result], 200);
        } catch (\Exception $e) {
            return response()->json((object) ["datasets" => []], 200);
        }
    }

    public function getDataChart1(Request $request) {
        try {
            $start_time = $request->get("start_time", Carbon::now()->subMonths(12)->toDateString());
            $start_time = Carbon::parse($start_time)->startOfMonth()->toDateString();
            $end_time = $request->get("end_time", Carbon::now()->toDateString());
            $end_time = Carbon::parse($end_time)->startOfMonth()->toDateString();
            $banks = $request->get("banks", "");
            $listBankDefault = Config::get("constants.LIST_BANK_DEFAULT");
            $banks = (!empty($banks) && $banks != "") ? explode(",", $banks) : [];
            $banks = array_merge($listBankDefault, $banks);
            $result = $this->reportBankService->getDataChart1([$start_time, $end_time], $banks);
            $result = $result->groupBy("report_time");
            $data = [];
            $dataColor = [];
            $result->map(function($value, $index) use(&$data, &$dataColor) {
                $item = [];
                $item["month"] = Carbon::parse($index)->format("m-Y");
                $value->map(function($bank, $indexBank) use(&$item, $value, &$dataColor){
                    if ($value->count() !== count($dataColor)) {
                        array_push($dataColor, (object) [
                            "field" => $bank->bank_id,
                            "name" => $bank->bank_id
                        ]);
                    }
                    $item[$bank->bank_id] = $bank->value;
                });
                array_push($data, (object) $item);
            });
            return response()->json((object) ["datasets" => $data, "dataColor" => $dataColor], 200);
        } catch (\Exception $e) {
            return response()->json((object) ["datasets" => [], "dataColor" => []], 200);
        }
    }

    public function getDataChart3(Request $request) {
        try {
            $time = $request->get("time", Carbon::now()->toDateString());
            $time = Carbon::parse($time)->firstOfMonth()->toDateString();
            $banks = $request->get("banks", "");
            $banks = (!empty($banks) && $banks != "") ? explode(",", $banks) : [];
            $result = $this->reportBankService->getDataChart3($time, $banks);
            $resultWordCloud = $result->where("kind", "kws")->groupBy("bank_id");
            $resultBarChart = $result->where("kind", "tags")->groupBy("bank_id");
            $colorBarChart = Config::get("constants.COLOR_BAR_CHART");
            $listColor = Config::get("constants.COLOR_BUBBLE_BORDER_CHART");
            $data = [];
            $defaultWordCloud = 160;
            $color = 0;
            $resultWordCloud->map(function($bank, $index) use(&$data, $resultBarChart, $defaultWordCloud, $colorBarChart, $listColor, &$color) {
                $result = (object)[
                    "wordCloud" => [],
                    "barChart" => []
                ];
                $listColorWordCloud = array_merge(array_slice($listColor, $color+1, count($listColor)), array_slice($listColor, 0, $color+1));
                $bank->map(function($kws, $indexKws) use(&$result, $bank, $defaultWordCloud, $listColorWordCloud) {
                    $percent = $kws->volumn_search / $bank[0]->volumn_search;
                    $wordCloudData = (object) [
                        "tag" => $kws->kws,
                        "weight" => ceil($defaultWordCloud * $percent),
                        "volume_search" => number_format($kws->volumn_search, 0),
                        "color" => $listColorWordCloud[$indexKws > 9 ? ($indexKws%$indexKws) : $indexKws]
                    ];
                    array_push($result->wordCloud, $wordCloudData);
                });
                $resultBarChart[$index]->map(function($tag, $indexTag) use(&$result, $colorBarChart) {
                    $barChartData = (object) [
                        "tag" => $tag->kws,
                        "weight" => $tag->volumn_search, 
                        "color" => $colorBarChart,
                    ];
                    array_push($result->barChart, $barChartData);
                });
                $color += 1;
                $data[$index] = $result;
            });
            return response()->json((object) ["datasets" => $data], 200);
        } catch (\Exception $e) {
            return response()->json((object) ["datasets" => []], 200);
        }
    }
}
