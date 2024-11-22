<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDestinationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust this based on your authorization logic
    }

    public function rules()
    {
        return [
            'number_of_persons' => 'required|integer|min:1', // Must be present, an integer, and at least 1
            'description' => 'required|string', // Must be present and a string
            'location' => 'required|string|max:255', // Must be present, a string, and up to 255 characters
            'start_date' => 'required|date|after_or_equal:' . now()->addDays(12)->toDateString(), // Must be a valid date and at least 12 days from now
            'end_date' => 'required|date|after:start_date', // Must be a valid date and after the start_date
        ];
    }

    public function messages()
    {
        return [
            'number_of_persons.required' => 'The number of persons is required.',
            'number_of_persons.integer' => 'The number of persons must be an integer.',
            'number_of_persons.min' => 'The number of persons must be at least 1.',
            'description.required' => 'A description is required.',
            'location.required' => 'A location is required.',
            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'start_date.after_or_equal' => 'The start date must be at least 12 days from now.',
            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after' => 'The end date must be after the start date.',
        ];
    }
}