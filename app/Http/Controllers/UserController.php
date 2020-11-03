<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginUserRequest;
use App\Services\Users\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    
    /**
     * Display a login page
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect(route("dashboard.index"));
        }
        return view("admin.pages.login");
    }

    /**
     * login user
     * 
     */
    public function login(LoginUserRequest $request)
    {
        try {
            $input = $request->only("email", "password");
            $result = $this->userService->loginUser($input);

            if (!!$result) {
                return redirect(route("dashboard.index"));
            }

            $request->session()->flash("error", "Username or Password is not correct.");
            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash("error", $e->getMessage());
            return redirect()->back();
        }
    }

    public function forgotPassword() {
        try {

        } catch (\Exception $e) {

        }
    }

    /**
     * logout user
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route("login.view");
    }

    public function listUser() {
        return view("admin.pages.users.list");
    }

    public function getListUser(Request $request) {
        $input = $request->all();
        $result = $this->userService->getAll($input);
        return response()->json($result, 200);
    }

    /**
     * Display a change password page
     */
    public function changePassword()
    {
        return view("admin.pages.users.changePassword");
    }

    public function postChangePassword(ChangePasswordRequest $request) {
        try {
            $input = $request->only("newPassword", "currentPassword");
            if (!Hash::check($input["currentPassword"], Auth::user()->password)) {
                $request->session()->flash("error", "Current password is incorrect!");
                return redirect()->back();     
            }

            $result = $this->userService->changePassword($input);
            if ($result === false) {
                $request->session()->flash("error", "An error has occured when changing password.");
                return redirect()->back();
            }

            $request->session()->flash("success", "Password has been changed successfully.");
            return redirect(route("dashboard.index"));
        } catch (\Exception $e) {
            $request->session()->flash("error", "An error has occured when changing password.");
            return redirect()->back();
        }
    }

    /**
     * Display a add user page
     */
    public function addUser()
    {
        return view("admin.pages.users.add");
    }

    public function create(AddUserRequest $request)
    {
        try {
            $result = $this->userService->create($request);
            if ($result->status === false) {
                $request->session()->flash("error", $result->message);
                return redirect()->back();
            }
            
            $request->session()->flash("success", "User has been created successfully.");
            return redirect()->route("usermanage.list");
        } catch (\Exception $e) {
            $request->session()->flash("error", "An error has occured when creating user.");
            return redirect()->back();
        }
    }

    /**
     * Display a edit user page
     */
    public function editUser()
    {
        return view("admin.pages.users.edit");
    }

    public function delete($id) {
        try {
            $this->userService->delete($id);
            return response()->json((object)["message" => "User has been deleted successfully."], 200);
        } catch (\Exception $e) {
            return response()->json((object)["message" => "An error has occured when delete user"], 400);
        }
    } 
}
