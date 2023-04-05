<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:20',
            'description' => 'required|max:300',
            'price' => 'required|max:5|numeric',
            'offer' => 'numeric|max:2'
        ];

        
    }
    public function messages():array{

        return [
          
            'name.required'=> 'The name field is missing',
            'name.max' => 'The name must be contain 20 characters',
            'description.required' => 'The description field is missing',
            'description.max' => 'The description must be contain 20 characters',
            'price.required' => 'The price field is missing',
            'price.max' => 'The price must be contain 5 characters',
            'offer.max' => 'The offer field must be contain 2 characters'

        ];
    }
}
