<?php

namespace App\Services\Users;

interface UserServiceInterface {
    /**
     * login user
     */
    public function loginUser(array $input);
    public function create($input);
    public function changePassword($input);
    public function delete($id);
    public function getAll($request);
}