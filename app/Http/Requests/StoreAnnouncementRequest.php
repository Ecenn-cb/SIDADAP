<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnouncementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',

            'description' => 'required|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'status' => 'required|in:Active,Inactive',
        ];
    }
}