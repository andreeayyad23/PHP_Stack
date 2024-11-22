<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDestinationRequest;
use App\Models\Destination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class CreateController extends Controller
{
        // Show the form for creating a new destination
    public function create()
    {
         return view('create'); // Adjust this path as per your folder structure
    }
    public function store(StoreDestinationRequest $request)
    {
        // Log the incoming request data for debugging
        Log::debug('Incoming request data:', $request->all());

        // Validate and parse start and end dates
        try {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
        } catch (\Exception $e) {
            return $this->handleError('Invalid date format. Please use a valid date format.', $request, $e);
        }

        // Validate date range
        if ($this->isInvalidDateRange($start_date, $end_date)) {
            return $this->handleError('Invalid date range: start date cannot be after end date.', $request);
        }

        // Attempt to create the destination
        try {
            $destination = $this->createDestination($request, $start_date, $end_date);
            Log::info('Destination created successfully!', ['destination_id' => $destination->id]);

            return redirect()->route('dashboard')->with('success', 'Destination created successfully!');
        } catch (QueryException $e) {
            return $this->handleError('Failed to create destination due to a database error. Please try again.', $request, $e);
        } catch (\Exception $e) {
            return $this->handleError('An unexpected error occurred. Please try again.', $request, $e);
        }
    }

    private function isInvalidDateRange($start_date, $end_date)
    {
        // Ensure that both $start_date and $end_date are Carbon instances
        if (!$start_date instanceof Carbon || !$end_date instanceof Carbon) {
            return true;
        }
        return $start_date->gt($end_date);
    }

    private function createDestination($request, $start_date, $end_date)
    {
        return Destination::create([
            'number_of_persons' => $request->input('number_of_persons'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'user_id' => Auth::id(),
            'start_date' => $start_date->format('Y-m-d'), // Format as needed
            'end_date' => $end_date->format('Y-m-d'),     // Format as needed
        ]);
    }

    private function handleError($message, $request, \Exception $e = null)
    {
        // Log the error with context
        Log::error($message, [
            'request' => $request->all(),
            'user_id' => Auth::id(),
            'exception' => $e ? $e->getMessage() : null,
        ]);

        // Redirect back with an error message
        return redirect()->back()->with('error', $message);
    }
}