<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:' . implode(',', array_keys(TaskStatus::toArray())),
            'due_date' => 'nullable|date',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',
            'status.required' => 'Status is required',
            'status.string' => 'Status must be a string',
            'status.in' => 'Invalid status value',
            'due_date.date' => 'Due date must be a valid date',
        ];
    }
}
