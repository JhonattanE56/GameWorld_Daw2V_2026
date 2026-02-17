<?php

    namespace App\Http\Controllers;

    use App\Enums\GameAgeRatingEnum;
    use App\Enums\GameGamemodeEnum;
    use App\Enums\GameGenreEnum;
    use App\Enums\GamePlatformEnum;
    use App\Helpers\CustomFunctions;
    use App\Http\Requests\StoreGameRequest;
    use App\Http\Requests\UpdateGameRequest;
    use App\Models\Game;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

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
            return view('games.index', ['items' => Game::whereNull('deleted_at')->get()->sortByDesc('num')]);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('games.create', [
                'gamemodes'   => CustomFunctions::getEnumKeyLabelArray(GameGamemodeEnum::class),
                'age_ratings' => CustomFunctions::getEnumKeyLabelArray(GameAgeRatingEnum::class),
                'genres'      => CustomFunctions::getEnumKeyLabelArray(GameGenreEnum::class),
                'platorms'    => CustomFunctions::getEnumKeyLabelArray(GamePlatformEnum::class),
            ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @throws \Throwable
         */
        public function store(StoreGameRequest $request)
        {
            $validated = $request->validated();

            $game = new Game();
            $game->id = CustomFunctions::generateUniqueId();
            $game->title = $validated['title'];
            $game->developer = $validated['developer'];
            $game->publisher = $validated['publisher'] ?? null;
            $game->date_released = $validated['date_released'] ?? null;
            $game->platform = GamePlatformEnum::from($validated['platform']);
            $game->genre = GameGenreEnum::from($validated['genre']);
            $game->gamemode = GameGamemodeEnum::from($validated['gamemode']);
            $game->age_rating = GameAgeRatingEnum::from($validated['age_rating']);
            $game->description = $validated['description'] ?? null;
            $game->user_id = Auth::id();

            if ($request->hasFile('image')) {
                $game->image = $request->file('image')->store('games', 'public');
            }

            $game->saveOrFail();

            return redirect()->route('games.show', $game->id)->with('status', 'Juego creado correctamente.');
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $game = Game::findOrFail($id);

            return view('games.show', ['item' => $game]);
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $game = Game::findOrFail($id);

            return view('games.edit', [
                'item'        => $game,
                'gamemodes'   => CustomFunctions::getEnumKeyLabelArray(GameGamemodeEnum::class),
                'age_ratings' => CustomFunctions::getEnumKeyLabelArray(GameAgeRatingEnum::class),
                'genres'      => CustomFunctions::getEnumKeyLabelArray(GameGenreEnum::class),
                'platforms'   => CustomFunctions::getEnumKeyLabelArray(GamePlatformEnum::class),
            ]);
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(UpdateGameRequest $request, string $id)
        {
            $game = Game::findOrFail($id);
            $validated = $request->validated();

            $game->title = $validated['title'];
            $game->developer = $validated['developer'];
            $game->publisher = $validated['publisher'] ?? null;
            $game->date_released = $validated['date_released'] ?? null;
            $game->platform = GamePlatformEnum::from($validated['platform']);
            $game->genre = GameGenreEnum::from($validated['genre']);
            $game->gamemode = GameGamemodeEnum::from($validated['gamemode']);
            $game->age_rating = GameAgeRatingEnum::from($validated['age_rating']);
            $game->description = $validated['description'] ?? null;

            if ($request->hasFile('image')) {
                $game->image = $request->file('image')->store('games', 'public');
            }

            $game->saveOrFail();

            return redirect()->route('games.show', $game->id)->with('status', 'Juego actualizado correctamente.');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $game = Game::findOrFail($id);
            $game->delete();

            return redirect()->route('games.index')->with('status', 'Juego eliminado correctamente.');
        }
    }
