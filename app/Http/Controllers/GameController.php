<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameInfoRequest;
use App\Http\Services\GameService;
use App\Models\Game;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GameController extends Controller
{
    private $gameService;

    public function __construct()
    {
        $this->gameService = new GameService();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $gameInfo = Game::query()->where('token', $request->token)->first();

        return response()->json(['gameInfo' => $gameInfo], 200);
    }

    /**
     * @param GameInfoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(GameInfoRequest $request) : JsonResponse
    {
        $game = Game::create($request->all());
        return response()->json(['gameInfo' => $game], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkingWinner(Request $request) : JsonResponse
    {
        $conditionalArray = $this->gameService->makeConditionCheakingArray($request->board_length);
        $winner = $this->gameService->conditionChecking($conditionalArray, $request->board);
        return response()->json(['winner' => $winner], 200);

    }
}
