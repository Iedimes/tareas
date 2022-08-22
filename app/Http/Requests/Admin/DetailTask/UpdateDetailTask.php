<?php

namespace App\Http\Requests\Admin\DetailTask;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDetailTask extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.detail-task.edit', $this->detailTask);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'task_id' => ['sometimes', 'integer'],
            'state_id' => ['sometimes', 'integer'],
            'date_begin' => ['sometimes', 'date'],
            'date_end' => ['sometimes', 'date'],
            'obs' => ['sometimes', 'string'],
            'user_id' => ['sometimes', 'integer'],
            'advance' => ['sometimes', 'integer'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
