<?php

namespace App\Imports;

use App\Imports\Sheets\DataSheertImport;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReportBanksImport implements WithMultipleSheets
{
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            "final_bqi_5b_bb" => new DataSheertImport(),
            "final_bqi_5b_tb" => new DataSheertImport(),
            "final_bqi_local_bb" => new DataSheertImport(),
            "final_bqi_local_tb" => new DataSheertImport(),
            "final_bqi_global_bb" => new DataSheertImport(),
            "final_bqi_global_tb" => new DataSheertImport(),
            "final_bqi_month_local_bb" => new DataSheertImport(),
            "final_bqi_month_local_tb" => new DataSheertImport(),
            "final_bqi_month_global_bb" => new DataSheertImport(),
            "final_bqi_month_global_tb" => new DataSheertImport(),
            "final_bqi_products_bb" => new DataSheertImport(),
            "final_bqi_product_local_tb" => new DataSheertImport(),
            "chart1_bank_index" => new DataSheertImport(),
            "chart2_tb" => new DataSheertImport(),
            "chart3_top10" => new DataSheertImport(),
            "chart4_daily" => new DataSheertImport(),
        ];
    }
}
