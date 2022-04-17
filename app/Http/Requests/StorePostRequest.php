<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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


            'title' => ['required', 'min:3', 'unique:posts,title,'.$this->title.',title',],
            'description' => ['required', 'min:10'],
            'post_creator' => ['exists:App\Models\User,id'],
            'avatar' => 'mimes:jpeg,jpg,png|required|max:10000'

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'title.required' => 'Title required',
            'title.min' => 'Title must be more than 3 char',
            'title.unique' => 'this Title already exists',
            'description.min' => 'Title must be more than 10 char',
            'description.required' => 'description required',
            'avatar.required' => 'avatar required',

        ];
    }
}
