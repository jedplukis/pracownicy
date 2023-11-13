<?php

namespace App\Enums;

enum Dieta: string
{
    case Vegan = 'vegan';
    case Vegeterian = 'vegeterian';
    case Venom = 'venom';

    /**
     * @return array
     */
    public static function getAllValues(): array
    {
        return array_column(Dieta::cases(), 'value');
    }

}
