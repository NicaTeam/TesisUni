<?php

namespace SalesProgram\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonFormRequest extends FormRequest
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

            'name' => 'required|max:255',

            'titles_id' => 'required|numeric',

            'lastName' => 'required|max:255',

            'email' => 'required|email',

            'telephone' =>'required',

            'company_id' => 'required|numeric'
        ];
    }
}
