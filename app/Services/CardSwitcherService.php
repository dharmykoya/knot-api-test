<?php

namespace App\Services;

use App\Models\CardSwitcherTask;

class CardSwitcherService {

    public function createTask($data) {
        $user = auth()->user();
        $userCard = $user->cards()->where('id', $data['card_id'])->first();

        if(!$userCard) {
            return ['status' => false, 'message' => "Card not found"];
        }

        $task =  CardSwitcherTask::create([
            'card_id' => $data['card_id'],
            'merchant_id' => $data['merchant_id'],
            'user_id' => $user->id,
        ]);

        return ['status' => true, 'data' => $task];
    }
}
