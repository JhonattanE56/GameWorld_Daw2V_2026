<?php

namespace App\Enums;

enum GameGenreEnum: string
{
    case RPG = 'rpg';
    case ACTION = 'action';
    case STRATEGY = 'strategy';
    case SPORTS = 'sports';
    case ADVENTURE = 'adventure';
}
