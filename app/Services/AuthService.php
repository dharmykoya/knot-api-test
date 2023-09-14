<?php

namespace App\Services;

use App\Models\User;

class AuthService {
    public function registerUser($data) {
        return User::create($data);
    }
}
