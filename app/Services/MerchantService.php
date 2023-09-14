<?php

namespace App\Services;

use App\Models\Merchant;

class MerchantService {
    public function getAllMerchants($request) {
        $perPage = $request->per_page ?? 10;
        return Merchant::query()->paginate($perPage);
    }
}
