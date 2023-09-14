<?php

namespace App\Services;

use App\Models\CardSwitcherTask;
use App\Models\User;

class CardSwitcherService {

    public function createTask($data) {
        $user = auth()->user();
        $userCard = $user->cards()->where('id', $data['card_id'])->first();
        $previousTask = $user->tasks()->orderBy('created_at', 'DESC')->first();

        if(!$userCard) {
            return ['status' => false, 'message' => "Card not found"];
        }

        if ($previousTask && $previousTask->status == CardSwitcherTask::PENDING) {
            return ['status' => false, 'message' => "Please complete your last task"];
        }

        $task =  CardSwitcherTask::create([
            'card_id' => $data['card_id'],
            'merchant_id' => $data['merchant_id'],
            'user_id' => $user->id,
            'previous_card_id' => $previousTask->card_id ?? null
        ]);

        return ['status' => true, 'data' => $task];
    }

    public function updateStatus($data, $taskId) {
        $task = CardSwitcherTask::find($taskId);

        if(!$task) {
            return ['status' => false, 'message' => "Task not found"];
        }

        $task->update([
            'status' => $data['status']
        ]);

        return ['status' => true, 'data' => $task];
    }
}
