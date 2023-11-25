<?php

namespace App\Modules\Workers\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'imie' => $this->imie,
            'nazwisko' => $this->nazwisko,
            'telefon_1' => $this->telefon_1,
            'telefon_2' => $this->telefon_2,
            'dieta' => $this->dieta,
            'firma' => $this->firma,
        ];
    }
}
