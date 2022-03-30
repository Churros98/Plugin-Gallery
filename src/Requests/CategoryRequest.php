<?php

namespace Azuriom\Plugin\Gallery\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:30'],
        ];
    }

    /**
     * Get the validated data from the request.
     *
     * @param  mixed|null  $key
     * @param  mixed|null  $default
     * @return array
     */
    public function validated($key = null, $default = null)
    {
        $validated = parent::validated();
        return $validated;
    }
}