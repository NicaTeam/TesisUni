<?php

namespace SalesProgram\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CompanyFormRequest extends FormRequest
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

            'countries_id' => 'required|numeric',

            'company_types_id' => 'required|numeric',

            'payment_term_id' => 'required|numeric',

            'incoterm_id' => 'required|numeric',

            'name' => 'required|max:255|unique:companies',

            'shippingAddress' => 'required|max:255',

            'telephone' => 'required',

        ];
    }
}
