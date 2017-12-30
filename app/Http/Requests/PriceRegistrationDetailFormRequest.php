<?php

namespace SalesProgram\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRegistrationDetailFormRequest extends FormRequest
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
//            'price_registration_id' => 'required|numeric',
            'cigar_id' => 'required',
            'customer_type_id' => 'required',
            'price' => 'required'
        ];
    }
}
