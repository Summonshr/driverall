<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResource extends FormRequest
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
        return ['type' => 'required|bail|in:' . implode(',',array_keys(config('resource.types'))), 'name' => 'required', 'tags'=>'array', 'description' => 'required'] + $this->pickSpecificRules($this->get('type'));
    }

    public function pickSpecificRules($type)
    {
        return $this->setOfRules()[$type] ?? [];
    }

    public function setOfRules()
    {
        return [
            'office' => [],
            'hotel'=> [],
            'trip' => [
                'office_id'   => 'required|exists:offices,id,user_id,' . $this->user()->id
            ]
        ];
    }
}
