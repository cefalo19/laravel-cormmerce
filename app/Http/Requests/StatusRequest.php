<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class StatusRequest extends Request
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
        $rules = [
            'name' => 'required|unique:statuses',
        ];

        if ($this->isMethod('put')) {
            $rules['name'] = 'required|unique:statuses,name,'.$this->segment(3);
        }

        return $rules;
    }
}
