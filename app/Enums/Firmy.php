<?php

namespace App\Enums;

enum Firmy: string
{
    case Firma1 = 'firma1';
    case Firma2 = 'firma2';
    case Firma3 = 'firma3';

    /**
     * @return array
     */
    public static function getAllValues(): array
    {
        return array_column(Firmy::cases(), 'value');
    }

    /**
     * @param string $input
     * @return bool
     */
    public static function exist(string $input): bool
    {
        $validValues = Firmy::getAllValues();

        // Check if the input string is one of the valid values
        return in_array($input, $validValues);
    }


}
