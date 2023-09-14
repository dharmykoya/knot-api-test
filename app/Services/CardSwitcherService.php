<?php

namespace App\Services;

use App\Models\CardSwitcherTask;
use Illuminate\Support\Facades\DB;

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

    public function latestTasks($request) {
        $userId = auth()->user()->id; // Assuming you are using Passport for authentication
        $perPage = $request->per_page ?? 10;

        return DB::table('card_switcher_tasks')
            ->join('merchants', 'card_switcher_tasks.merchant_id', '=', 'merchants.id')
            ->join('cards', 'card_switcher_tasks.card_id', '=', 'cards.id')
            ->select('merchants.name as merchant_name', 'cards.card_number', 'card_switcher_tasks.created_at')
            ->where('card_switcher_tasks.user_id', $userId)
            ->where('card_switcher_tasks.status', 'finished')
            ->orderBy('card_switcher_tasks.created_at', 'desc')
            ->distinct('merchants.id')
            ->paginate($perPage);
    }
}
