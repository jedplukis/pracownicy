<?php

namespace App\Modules\Workers\Requests;

use App\Enums\Dieta;
use App\Enums\Firmy;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['email', Rule::unique('workers', 'email')->ignore($this->id)],
            'imie' => ['string'],
            'nazwisko' => ['string'],
            'firma' => [Rule::in(Firmy::getAllValues())],
            'dieta' => [Rule::in(Dieta::getAllValues())],
            'telefon_1' => ['string'],
            'telefon_2' => ['nullable', 'string'],
        ];
    }
}
