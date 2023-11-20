<?php

namespace App\Modules\Workers\Requests;

use App\Enums\Dieta;
use App\Enums\Firmy;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkerCreateRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:workers'],
            'imie' => ['required'],
            'nazwisko' => ['required'],
            'firma' => ['required', Rule::in(Firmy::getAllValues())],
            'dieta' => ['required', Rule::in(Dieta::getAllValues())],
            'telefon_1' => ['string', 'required'],
            'telefon_2' => ['string', 'nullable'],
        ];
    }
}
