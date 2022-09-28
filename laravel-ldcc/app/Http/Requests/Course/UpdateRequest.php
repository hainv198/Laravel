<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        return [
            //quy tac minh truyen len form
            'name' => [
                'required', //bat buoc phai co chu khong duoc de trong
                'string', //phai nhap chu
                // validate theo model
                Rule::unique(Course::class)->ignore($this->course),
                //
//                Rule::unique('courses') -> ignore($this -> course),
            ]
        ];
    }
}
