<?php

namespace App\Modules\Workers\Exceptions;

class NotFoundException extends BaseException
{
    public static function message() {
        return new self('Pracownik nie znaleziony', 404);
    }
}
