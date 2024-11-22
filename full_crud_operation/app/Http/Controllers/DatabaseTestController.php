namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Assuming you have an Item model

class CreateController extends Controller
{
    public function create()
    {
        return view('create'); // Create a view for the form
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
        ]);

        // Create a new item
        Item::create($request->all());

        // Redirect with a success message
        return redirect()->route('dashboard')->with('success', 'Item created successfully!');
    }
}