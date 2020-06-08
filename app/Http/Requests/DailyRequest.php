<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'primresp' => 'required',
            'segunresp' => 'required',
            'tercresp' => 'required',
            'quartaresp' => 'required',
            'quintaresp' => 'required',
            'sextaresp' => 'nullable|image',
        ];
    }


    public function messages()
    {
        return [
            'primresp.required' => '"valor" é um campo obrigatório.',
            'segunresp.required' => '"quantidade em estoque" é um campo obrigatório.',
            'tercresp.required' => '"nome" é um campo obrigatório.',
            'quartaresp.required' => '"status" é um campo obrigatório.',
            'quintaresp.required' => '"descrição" é um campo obrigatório.',
        ];
    }
}

//php artisan make:request DailyRequest