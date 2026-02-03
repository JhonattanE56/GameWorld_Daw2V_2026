<?php

namespace App\Enums;

enum GamePlatformEnum: string
{
    case PC = 'pc';
    case PLAYSTATION = 'playstation';
    case XBOX = 'xbox';
    case NINTENDO = 'nintendo';
    case MOBILE = 'mobile';
    case OTHER = 'other';
}
