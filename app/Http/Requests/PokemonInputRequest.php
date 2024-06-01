<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PokemonInputRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {
        return [
            'title' => 'required|between:5,30',
            'url' => 'required|url',
            'desc' => 'required'
        ];
    }
}
