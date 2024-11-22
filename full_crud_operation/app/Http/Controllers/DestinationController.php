<?php
namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::where('user_id', Auth::id())->get();
        return view('dashboard', compact('destinations'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number_of_persons' => 'required|integer',
            'description' => 'required|string',
            'location' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Destination::create(array_merge($request->all(), ['user_id' => Auth::id()]));

        return redirect()->route('dashboard')->with('success', 'Destination created successfully.');
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('edit', compact('destination'));
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        if ($destination->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'number_of_persons' => 'required|integer',
            'description' => 'required|string',
            'location' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $destination->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Destination updated successfully.');
    }

    public function destroy($id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return redirect()->route('dashboard')->with('error', 'Destination not found.');
        }

        if ($destination->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
        }

        $destination->delete();

        return redirect()->route('dashboard')->with('success', 'Destination deleted successfully.');
    }
}