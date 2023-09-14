<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardRequest;
use App\Services\CardService;
use Illuminate\Http\Request;

class CardController extends Controller
{
    protected CardService $cardService;

    public function __construct(CardService $cardService) {
        $this->cardService = $cardService;
    }

    public function store(StoreCardRequest $request)
    {
        try {
            $newCard = $this->cardService->createCard($request->validated());

            return response()->created($newCard);
        } catch (\Exception $exception) {
            return response()->internalServerError('Something went wrong ,please contact support');
        }
    }

}
