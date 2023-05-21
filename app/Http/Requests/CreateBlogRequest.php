<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required | string",
            "description" => "required | string",
        ];
    }

    public function message(): array
    {
        return [
            "title.required" =>  "title field is required for blog",
            "title.string" => "title must be string",
            "description.required" => "description field is required for blog",
            "description.string" => "description must be string",
        ];
    }
}
