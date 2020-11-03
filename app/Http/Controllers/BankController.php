<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBankRequest;
use App\Http\Requests\EditBankRequest;
use App\Services\Banks\BankServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class BankController extends Controller
{
    protected $bankService;

    public function __construct(BankServiceInterface $bankService)
    {
        $this->bankService = $bankService;
    }

    public function list() {
        return view("admin.pages.banks.list");
    }

    public function getListBank(Request $request) {
        $input = $request->all();
        $result = $this->bankService->getAll($input);
        return response()->json($result, 200);
    }

    /**
     * Display a add bank page
     */
    public function addBank()
    {
        return view("admin.pages.banks.add");
    }

    /**
     * Display a edit bank page
     */
    public function editBank($id)
    {
        $bank = $this->bankService->find($id);
        return view("admin.pages.banks.edit", ["bank" => $bank]);
    }

    public function create(AddBankRequest $request) {
        try {
            $file = $request->file("bankLogo");
            $filename = (string) Str::uuid() . "." . $file->getClientOriginalExtension();
            $file->move(public_path() . Config::get("constants.PATH_FILE_LOGO_BANK"), $filename);
            $input = $request->only("bankType","identifier", "bankName");
            $input["image"] = $filename;
            $result = $this->bankService->create($input);

            if (!!$result) {
                $request->session()->flash("success", "Bank has been created successfully.");
                return redirect(route("bankmanage.list"));
            }

            $request->session()->flash("error", "Bank with this identifier has already existed.");
            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash("error", $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(EditBankRequest $request) {
        try {
            $input = $request->only("identifier", "bankName");
            $result = $this->bankService->update($input);
            if (!!$result) {
                $request->session()->flash("success", "Bank has been updated successfully.");
                return redirect()->back();
                return redirect(route("banks.list"));
            }

            $request->session()->flash("error", "An error has occured when updating bank.");
            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash("error", $e->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id) {
        try {
            $this->bankService->delete($id);
            return response()->json((object)["message" => "Bank has been deleted successfully."], 200);
        } catch (\Exception $e) {
            return response()->json((object)["message" => "An error has occured when deleting bank"], 400);
        }
    }
}
