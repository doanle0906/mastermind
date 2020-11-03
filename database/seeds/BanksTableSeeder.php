<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('banks')->insert([
        //     [
        //         "id" => "vietcombank",
        //         "bank_name" => "vietcombank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "techcombank",
        //         "bank_name" => "techcombank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "sacombank",
        //         "bank_name" => "sacombank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "vietinbank",
        //         "bank_name" => "vietinbank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "acbbank",
        //         "bank_name" => "acbbank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "vpbank",
        //         "bank_name" => "vpbank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "bidv",
        //         "bank_name" => "bidv",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "vibbank",
        //         "bank_name" => "vibbank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "mb",
        //         "bank_name" => "mb",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "tpbank",
        //         "bank_name" => "tpbank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "msb",
        //         "bank_name" => "msb",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "ocb",
        //         "bank_name" => "ocb",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "agribank",
        //         "bank_name" => "agribank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "vietbank",
        //         "bank_name" => "vietbank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "namabank",
        //         "bank_name" => "namabank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "scb",
        //         "bank_name" => "scb",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "hdbank",
        //         "bank_name" => "hdbank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "bacabank",
        //         "bank_name" => "bacabank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "eximbank",
        //         "bank_name" => "eximbank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "seabank",
        //         "bank_name" => "seabank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "pgbank",
        //         "bank_name" => "pgbank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "oceanbank",
        //         "bank_name" => "oceanbank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "gpbank",
        //         "bank_name" => "gpbank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "daiabank",
        //         "bank_name" => "daiabank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "vietabank",
        //         "bank_name" => "vietabank",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "ncb",
        //         "bank_name" => "ncb",
        //         "type" => "LOCAL",
        //     ],
        //     [
        //         "id" => "hsbc",
        //         "bank_name" => "hsbc",
        //         "type" => "GLOBAL",
        //     ],
        //     [
        //         "id" => "citi",
        //         "bank_name" => "citi",
        //         "type" => "GLOBAL",
        //     ],
        //     [
        //         "id" => "shinhan",
        //         "bank_name" => "shinhan",
        //         "type" => "GLOBAL",
        //     ],
        //     [
        //         "id" => "standardchartered",
        //         "bank_name" => "standardchartered",
        //         "type" => "GLOBAL",
        //     ],
        //     [
        //         "id" => "anz",
        //         "bank_name" => "anz",
        //         "type" => "GLOBAL",
        //     ],
        //     [
        //         "id" => "hongleong",
        //         "bank_name" => "hongleong",
        //         "type" => "GLOBAL",
        //     ],
        //     [
        //         "id" => "public",
        //         "bank_name" => "public",
        //         "type" => "GLOBAL",
        //     ],
        //     [
        //         "id" => "woori",
        //         "bank_name" => "woori",
        //         "type" => "GLOBAL",
        //     ],
        //     [
        //         "id" => "uob",
        //         "bank_name" => "uob",
        //         "type" => "GLOBAL",
        //     ]
        // ]);

        DB::table('banks')->insert([
            [
                "id" => "vietcombank",
                "bank_name" => "vietcombank",
                "type" => "LOCAL",
            ],
            [
                "id" => "techcombank",
                "bank_name" => "techcombank",
                "type" => "LOCAL",
            ],
            [
                "id" => "sacombank",
                "bank_name" => "sacombank",
                "type" => "LOCAL",
            ],
            [
                "id" => "vietinbank",
                "bank_name" => "vietinbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "acbbank",
                "bank_name" => "acbbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "vpbank",
                "bank_name" => "vpbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "bidv",
                "bank_name" => "bidv",
                "type" => "LOCAL",
            ],
            [
                "id" => "vibbank",
                "bank_name" => "vibbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "shbbank",
                "bank_name" => "shbbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "mb",
                "bank_name" => "mb",
                "type" => "LOCAL",
            ],
            [
                "id" => "tpbank",
                "bank_name" => "tpbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "msb",
                "bank_name" => "msb",
                "type" => "LOCAL",
            ],
            [
                "id" => "ocb",
                "bank_name" => "ocb",
                "type" => "LOCAL",
            ],
            [
                "id" => "agribank",
                "bank_name" => "agribank",
                "type" => "LOCAL",
            ],
            [
                "id" => "vietbank",
                "bank_name" => "vietbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "anbinh",
                "bank_name" => "anbinh",
                "type" => "LOCAL",
            ],
            [
                "id" => "namabank",
                "bank_name" => "namabank",
                "type" => "LOCAL",
            ],
            [
                "id" => "scb",
                "bank_name" => "scb",
                "type" => "LOCAL",
            ],
            [
                "id" => "dongabank",
                "bank_name" => "dongabank",
                "type" => "LOCAL",
            ],
            [
                "id" => "hdbank",
                "bank_name" => "hdbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "bacabank",
                "bank_name" => "bacabank",
                "type" => "LOCAL",
            ],
            [
                "id" => "eximbank",
                "bank_name" => "eximbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "seabank",
                "bank_name" => "seabank",
                "type" => "LOCAL",
            ],
            [
                "id" => "pgbank",
                "bank_name" => "pgbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "oceanbank",
                "bank_name" => "oceanbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "gpbank",
                "bank_name" => "gpbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "daiabank",
                "bank_name" => "daiabank",
                "type" => "GLOBAL",
            ],
            [
                "id" => "vietabank",
                "bank_name" => "vietabank",
                "type" => "LOCAL",
            ],
            [
                "id" => "ncb",
                "bank_name" => "ncb",
                "type" => "LOCAL",
            ],
            [
                "id" => "cbbank",
                "bank_name" => "cbbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "vrb",
                "bank_name" => "vrb",
                "type" => "LOCAL",
            ],
            [
                "id" => "vbsp",
                "bank_name" => "vbsp",
                "type" => "LOCAL",
            ],
            [
                "id" => "vdb",
                "bank_name" => "vdb",
                "type" => "LOCAL",
            ],
            [
                "id" => "coopbank",
                "bank_name" => "coopbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "saigonbank",
                "bank_name" => "saigonbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "vietcapitalbank",
                "bank_name" => "vietcapitalbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "kienlongbank",
                "bank_name" => "kienlongbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "lienvietpostbank",
                "bank_name" => "lienvietpostbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "baovietbank",
                "bank_name" => "baovietbank",
                "type" => "LOCAL",
            ],
            [
                "id" => "pvcombank",
                "bank_name" => "pvcombank",
                "type" => "LOCAL",
            ],
            [
                "id" => "hsbc",
                "bank_name" => "hsbc",
                "type" => "GLOBAL",
            ],
            [
                "id" => "citibank",
                "bank_name" => "citibank",
                "type" => "GLOBAL",
            ],
            [
                "id" => "shinhanbank",
                "bank_name" => "shinhanbank",
                "type" => "GLOBAL",
            ],
            [
                "id" => "standardcharteredbank",
                "bank_name" => "standardcharteredbank",
                "type" => "GLOBAL",
            ],
            [
                "id" => "anzbank",
                "bank_name" => "anzbank",
                "type" => "GLOBAL",
            ],
            [
                "id" => "hongleongbank",
                "bank_name" => "hongleongbank",
                "type" => "GLOBAL",
            ],
            [
                "id" => "publicbank",
                "bank_name" => "publicbank",
                "type" => "GLOBAL",
            ],
            [
                "id" => "wooribank",
                "bank_name" => "wooribank",
                "type" => "GLOBAL",
            ],
            [
                "id" => "uob",
                "bank_name" => "uob",
                "type" => "GLOBAL",
            ],
            [
                "id" => "cimb",
                "bank_name" => "cimb",
                "type" => "GLOBAL",
            ],
            [
                "id" => "ivb",
                "bank_name" => "ivb",
                "type" => "GLOBAL",
            ],
            [
                "id" => "mbbank",
                "bank_name" => "mbbank",
                "type" => "GLOBAL",
            ]
        ]);
    }
}
