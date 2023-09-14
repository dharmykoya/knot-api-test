<?php

namespace App\Services;

use App\Models\Card;
use Carbon\Carbon;

class CardService {
    public function createCard($data) {
        $user = auth()->user();
        $data['expiration'] = Carbon::parse($data['expiration']);
        return $user->cards()->create($data);
    }
}
