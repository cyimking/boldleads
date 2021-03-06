<?php

namespace BoldLeads\Http\Requests\Leads;

use Illuminate\Foundation\Http\FormRequest;

class CreateLead extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // All users can submit forms...
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
            'first_name' => 'nullable|min:3|max:255',
            'last_name' => 'nullable|min:3|max:255',
            'email' => 'required|email|unique:leads',
            'phone_number' => 'nullable|',
            'address' => 'nullable|min:3',
            'home_square_footage' => 'nullable|integer'
        ];
    }
}
