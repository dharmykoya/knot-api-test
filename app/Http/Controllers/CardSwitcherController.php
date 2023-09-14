<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCardSwitcherRequest;
use App\Http\Requests\UpdateCardSwitcherStatusRequest;
use App\Services\CardSwitcherService;
use Illuminate\Http\Request;

class CardSwitcherController extends Controller
{
    protected CardSwitcherService $cardSwitcherService;

    public function __construct(CardSwitcherService $cardSwitcherService) {
        $this->cardSwitcherService = $cardSwitcherService;
    }

    public function store(CreateCardSwitcherRequest $request)
    {
        try {
            $task = $this->cardSwitcherService->createTask($request->validated());
            if (!$task['status']) {
                return response()->badRequest($task['message']);
            }

            return response()->created($task['data']);
        } catch (\Exception $exception) {
            return response()->internalServerError('Something went wrong ,please contact support');
        }
    }

    public function updateTaskStatus(UpdateCardSwitcherStatusRequest $request, $taskId)
    {
        try {
            $task = $this->cardSwitcherService->updateStatus($request->validated(), $taskId);
            if (!$task['status']) {
                return response()->badRequest($task['message']);
            }

            return response()->created($task['data']);
        } catch (\Exception $exception) {
            dd($exception);
            return response()->internalServerError('Something went wrong ,please contact support');
        }
    }

}
