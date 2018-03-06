<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'name' => 'required',
            'categories' => 'required',
            'description' => 'required|max:255',
            'image' => 'required_with: imagecount',
            'price' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required', ['attributes' => 'Nome']),
            'files.required' => trans('validation.required', ['attributes' => 'Imagem']),
            'categories.required' => trans('validation.required', ['attributes' => 'Categorias']),
            'categories.array' => trans('validation.array', ['attributes' => 'Categorias']),
            'description.required' => trans('validation.required', ['attributes' => 'Descrição']),
            'description.max' => trans('validation.max', ['attributes' => 'Descrição']),
            'price.required' => trans('validation.required', ['attributes' => 'Preço']),
            'price.numeric' => trans('validation.required', ['attributes' => 'Preço']),
        ];
    }
}
