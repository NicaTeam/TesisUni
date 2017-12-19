<?php

namespace SalesProgram\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CigarFormRequest extends FormRequest
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

            'category_products_id' => 'required|numeric',

            'brand_groups_id' => 'required|numeric',

            'unit_of_measurements_id' => 'required|numeric',

            'cigar_sizes_id' => 'required|numeric',

            'barcode' =>'required|max:20',

            'name' => 'required|min:3|max:200',

            'netWeight' => 'required|numeric',

            'unitsInPresentation' => 'required|numeric',

            'image' => 'mimes:jpeg,bmp,png'
        ];


    }
}
