<?php

namespace App\Http\Controllers;

use App\Services\Banks\BankServiceInterface;
use App\Services\ReportBanks\ReportBankServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Config;

class DashboardController extends Controller
{
    protected $reportBankService;
    protected $bankService;

    public function __construct(ReportBankServiceInterface $reportBankService, BankServiceInterface $bankService)
    {
        $this->reportBankService = $reportBankService;
        $this->bankService = $bankService;
    }
    
    public function index() {
        $listTimeChart2 = $this->reportBankService->getListTimeChart2();
        $listTimeChart2  = $listTimeChart2->groupBy("report_time")->keys();

        $listTimeChart4 = $this->reportBankService->getListTimeChart4();
        $listTimeChart4  = $listTimeChart4->groupBy("report_time")->keys();

        $listTimeChart1 = $this->reportBankService->getListTimeChart1();
        $listTimeChart1  = $listTimeChart1->groupBy("report_time")->keys();

        $listTimeChart3 = $this->reportBankService->getListTimeChart3();
        $listTimeChart3  = $listTimeChart3->groupBy("report_time")->keys();

        $listBank = $this->bankService->getAllBank();
        $listBankDefault = Config::get("constants.LIST_BANK_DEFAULT");
        $banks = $listBank->whereNotIn("id", $listBankDefault);
        $payload = [
            "exp" => Carbon::now()->addDays(1)->timestamp,
        ];

        $jwt = JWT::encode($payload, env("HOLISTICS_SECRET_KEY"));
        return view("admin.pages.dashboards.index", ["time_chart2" => $listTimeChart2, "list_bank" => $listBank, "time_chart4" => $listTimeChart4, "time_chart1" => $listTimeChart1, "time_chart3" => $listTimeChart3, "banks" => $banks]);
    }

    public function test() {
        $listTimeChart2 = $this->reportBankService->getListTimeChart2();
        $listTimeChart2  = $listTimeChart2->groupBy("report_time")->keys();

        $listTimeChart4 = $this->reportBankService->getListTimeChart4();
        $listTimeChart4  = $listTimeChart4->groupBy("report_time")->keys();

        $listTimeChart1 = $this->reportBankService->getListTimeChart1();
        $listTimeChart1  = $listTimeChart1->groupBy("report_time")->keys();

        $listTimeChart3 = $this->reportBankService->getListTimeChart3();
        $listTimeChart3  = $listTimeChart3->groupBy("report_time")->keys();

        $listBank = $this->bankService->getAllBank();
        $listBankDefault = Config::get("constants.LIST_BANK_DEFAULT");
        $banks = $listBank->whereNotIn("id", $listBankDefault);
        return view("admin.pages.dashboards.test", [ "time_chart2" => $listTimeChart2, "list_bank" => $listBank, "time_chart4" => $listTimeChart4, "time_chart1" => $listTimeChart1, "time_chart3" => $listTimeChart3, "banks" => $banks]);
    }

    public function reportSearch() {
        $listTimeChart3 = $this->reportBankService->getListTimeChart3();
        $listTimeChart3  = $listTimeChart3->groupBy("report_time")->keys();

        $listBank = $this->bankService->getAllBank();
        return view("admin.pages.dashboards.report", [ "list_bank" => $listBank, "time_chart3" => $listTimeChart3]);
    }
}
