<?php

namespace App\Http\Requests\UsersRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
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
        $id = $this->route('id') ?? Auth::user()->id;

        return [
            "name" => "required|max:255",
            "email" => "required|max:255|email|unique:users,email,$id,id",
        ];
    }
}
