<?php

namespace App\Http\Controllers;

use App\Enums\GameAgeRatingEnum;
use App\Enums\GameGamemodeEnum;
use App\Enums\GameGenreEnum;
use App\Enums\GamePlatformEnum;
use App\Helpers\CustomFunctions;
use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * GameController
 */
class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: Show only NOT DELETED elements.
        return view('games.index', ['items' => Game::where('deleted_at', null)->get()->sortByDesc('num')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create', [
            'gamemodes' => CustomFunctions::getEnumKeyLabelArray(GameGamemodeEnum::class),
            'age_ratings' => CustomFunctions::getEnumKeyLabelArray(GameAgeRatingEnum::class),
            'genres' => CustomFunctions::getEnumKeyLabelArray(GameGenreEnum::class),
            'platorms' => CustomFunctions::getEnumKeyLabelArray(GamePlatformEnum::class),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|unique:games|max:255',
                'developer' => 'required',
                'publisher' => 'required',
                'date_released' => 'required',
                'platform' => 'required',
                'gamemode' => 'required',
                'age_rating' => 'required',
                'description' => 'required',
            ]
        );
        $game = new Game;
        $game->id = CustomFunctions::generateUniqueId();
        $game->title = $request['title'];
        $game->developer = $request['developer'];
        $game->publisher = $request['publisher'];
        $game->date_released = $request['date_released'];
        $game->platform = GamePlatformEnum::from($request['platform']);
        $game->genre = GameGenreEnum::from($request['genre']);
        $game->gamemode = GameGamemodeEnum::from($request['gamemode']);
        $game->age_rating = GameAgeRatingEnum::from($request['age_rating']);
        $game->description = $request['description'];
        $game->user_id = 'jhona';
        $game->image = '';
        if ($game->saveOrFail()) {
            return view('games.show', ['item' => $game]);
        }
        dd($game, $request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Game::where('id', $id)->get()->first();
        if (! $item instanceof Model) {
            abort(404);
        }

        return view('games.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $game = Game::where('id', $id)->get()->first();
        $game->deleted_at = new \DateTimeImmutable()->format('Y-m-d');
        $game->update();

        return view('games.show');
    }
}
