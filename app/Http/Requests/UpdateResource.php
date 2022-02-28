<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResource extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return request('resource')->user_id === $this->user()->id;
    }

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['name'=>'string','description'=>'string', 'type' => 'required|bail|in:' . implode(',',array_keys($this->setOfRules()))] + $this->pickSpecificRules($this->get('type'));
    }

    public function pickSpecificRules($type)
    {
        return $this->setOfRules()[$type] ?? [];
    }

    public function setOfRules()
    {
        return [
            'office' => [],
            'trip' => []
        ];
    }
}
