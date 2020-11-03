<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", "UserController@showLogin");
Route::get("/login", "UserController@showLogin")->name("login.view");
// Route::get("/import", "ReportBankController@import");
Route::post("/login", "UserController@login")->name("user.login");


// list route admin
Route::group([
    "prefix" => "",
    "middleware" => "admin.user"
], function() {
    Route::get("/", "DashboardController@index");
    Route::get("/dashboard", "DashboardController@index")->name("dashboard.index");
    Route::get("/report-search", "DashboardController@reportSearch")->name("report-search.index");
    Route::get("/test", "DashboardController@test")->name("dashboard.test");
    Route::get("/change-password", "UserController@changePassword")->name("user.changePassword");
    Route::post("/change-password", "UserController@postChangePassword")->name("user.postChangePassword");
    Route::group([
        "prefix" => "report"
    ], function() {
        Route::get("/chart2", "ReportBankController@getDataChart2")->name("report.chart2");
        Route::get("/chart4", "ReportBankController@getDataChart4")->name("report.chart4");
        Route::get("/chart1", "ReportBankController@getDataChart1")->name("report.chart1");
        Route::get("/chart3", "ReportBankController@getDataChart3")->name("report.chart3");
    });
    
    
    // Route::get("/edit-bank/{id}", "BankController@editBank")->name("bankmanage.edit");
    // Route::post("/update-bank", "BankController@update")->name("bankmanage.update");
    // logout
    Route::get("/logout", "UserController@logout")->name("user.logout");
});

Route::group([
    "prefix" => "",
    "middleware" => "admin.admin"
], function() {
    Route::get("/import-report-banks", "ReportBankController@viewImportReportBank")->name("reportbank.import");
    Route::get("/list-user", "UserController@listUser")->name("usermanage.list");
    Route::get("/add-user", "UserController@addUser")->name("usermanage.add");
    Route::post("/add-user", "UserController@create")->name("usermanage.postAdd");
    Route::get("/add-bank", "BankController@addBank")->name("bankmanage.add");
    Route::get("/list-bank", "BankController@list")->name("bankmanage.list");
    Route::post("/create-bank", "BankController@create")->name("bankmanage.create");
});

// api
Route::group([
    "prefix" => "apis",
    "middleware" => "admin.admin"
], function() {
    Route::post("/import-report-bank", "ReportBankController@importReport");
    Route::post("/report-bank-delete", "ReportBankController@importReport")->name("api.reportbank.delete");
    // Route::get("/report-banks", "ReportBankController@getDataReportBank")->name("api.reportbank.list");
    Route::get("/list-user", "UserController@getListUser")->name("api.usermanage.getList");
    Route::delete("/delete-user/{id}", "UserController@delete")->name("api.usermanage.delete");
    Route::get("/list-bank", "BankController@getListBank")->name("api.bankmanage.getList");
    Route::delete("/delete-bank/{id}", "BankController@delete")->name("api.bankmanage.delete");
});
