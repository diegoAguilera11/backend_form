<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'unique:forms'],
            'name' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'El campo código es obligatorio',
            'code.unique' => 'El campo código debe ser único',
            'name.required' => 'El campo nombre es obligatorio',
            'description.required' => 'El campo descripción es obligatorio',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
