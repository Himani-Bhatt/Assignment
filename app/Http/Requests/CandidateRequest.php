<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
        if ($this->request->has("edit")) {
            return [
                'name' => 'required',
                'email' => 'required|email',
                'image' => 'nullable|image|mimes:jpeg,png,jpg',
                'pdf' => 'nullable|mimes:pdf,doc,docx',
                // 'password' => 'required|min:8',
                'birth_date' => 'required|date',
                'gender' => 'required|integer',
                'phone' => 'required',
                'city' => 'required',
                'country' => 'required',
            ];
        } else {
            return [
                'name' => 'required',
                'email' => 'required|email',
                'image' => 'required|image|mimes:jpeg,png,jpg',
                'pdf' => 'required|mimes:pdf,doc,docx',
                'password' => 'required|min:8',
                'birth_date' => 'required|date',
                'gender' => 'required|integer',
                'phone' => 'required',
                'city' => 'required',
                'country' => 'required',
            ];

        }
    }
}
