<?php

namespace App\Services\Users;

use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface {

    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * login user
     * @param array 
     * @return boolean
     */
    public function loginUser(array $input) {
        try {
            if (Auth::attempt($input)) {
                return true;
            }

            return false;
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function create($input) {
        try {
            // check email exitst
            $user = $this->userRepo->findUserByEmail($input->get("email"));
            if (!empty($user)) {
                return (object) [
                    "status" => false,
                    "message" => "User with this email has already existed!"
                ];
            }

            $data = [
                "email" => $input->get("email"),
                "name" => $input->get("name"),
                "password" => bcrypt($input->get("password"))
            ];
            $user = $this->userRepo->create($data);
            if (empty($user)) {
                return (object) [
                    "status" => false,
                    "message" => "Create user error!"
                ];
            }

            return (object) [
                "status" => true,
                "message" => "Create user success!"
            ];
        } catch (\Exception $e) {
            throw($e);
        }
    }

    public function changePassword($input) {
        try {
            $data = [
                "password" => bcrypt($input["newPassword"])
            ];
            return $this->userRepo->update(Auth::user()->id, $data);
        } catch (\Exception $e) {
            throw($e);
        }
    }

    public function delete($id) {
        try {
            return $this->userRepo->delete($id);
        } catch (\Exception $e) {
            throw($e);
        }
    }

    public function getAll($request) {
        try {
            $request = (object) $request;
            $field = empty($request->field) ? "" : $request->field;
            $orderBy = empty($request->orderBy) ? "" : $request->orderBy;
            $search = empty($request->search) ? "" : $request->search;
            $page = empty($request->page) ? 1 : (int) $request->page;
            $result = $this->userRepo->getAll($field, $orderBy, $search, $page);

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
        } catch (\Exception $e) {
            return (object)[
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            ];
        }
    }
}