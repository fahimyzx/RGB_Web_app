<?php

namespace App\Http\Controllers;

use App\Models\RgbObject;
use Illuminate\Http\Request;

class RgbObjectController extends Controller
{
    // 🔹 Constructor: Ensure only authenticated users can access the controller
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 🔹 1. Dashboard: Show the search form
    public function dashboard()
    {
        return view('dashboard');
    }

    // 🔹 2. Search RGB Data: Validate inputs and search for a matching object
    public function search(Request $request)
    {
        // Validate the RGB inputs
        $validated = $request->validate([
            'red' => 'required|integer|min:0|max:255',
            'green' => 'required|integer|min:0|max:255',
            'blue' => 'required|integer|min:0|max:255',
        ]);

        // Search for the object in the database (strict match)
        $result = RgbObject::where('red', $validated['red'])
            ->where('green', $validated['green'])
            ->where('blue', $validated['blue'])
            ->first(); // Retrieves only the first matching record

        // Return the result to the view
        return view('rgb_objects.search_result', [
            'object' => $result, // The matched object or null
            'input' => $validated, // The user's input values
        ]);
    }

    // 🔹 3. List RGB objects with optional quick search
    public function index(Request $request)
    {
        $query = RgbObject::query();

        // Optional search logic: if the 'search' input is provided, filter by red, green, or blue
        if ($request->has('search') && $request->search !== null) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('red', $search)
                  ->orWhere('green', $search)
                  ->orWhere('blue', $search);
            });
        }

        $rgbObjects = $query->get(); // Get the filtered or all RGB objects
        return view('rgb_objects.index', compact('rgbObjects'));
    }

    // 🔹 4. Show the form to create a new RGB object
    public function create()
    {
        return view('rgb_objects.create');
    }

    // 🔹 5. Store a new RGB object
    public function store(Request $request)
    {
        // Validate the input data for creating a new RGB object
        $validatedData = $request->validate([
            'red' => 'required|integer|min:0|max:255',
            'green' => 'required|integer|min:0|max:255',
            'blue' => 'required|integer|min:0|max:255',
            'object_material' => 'required|string|max:255',
            'object_thickness' => 'nullable|string|max:255',
            'object_color' => 'required|string|max:255',
            'object_specific_data' => 'nullable|string',
        ]);

        // Create a new RGB object in the database
        RgbObject::create($validatedData);

        // Redirect back to the list of RGB objects with a success message
        return redirect()->route('rgb-objects.index')->with('success', 'RGB Object created successfully!');
    }

    // 🔹 6. View a single RGB object (for detailed view)
    public function show(RgbObject $rgbObject)
    {
        return view('rgb_objects.show', compact('rgbObject'));
    }

    // 🔹 7. Show the form to edit an existing RGB object
    public function edit(RgbObject $rgbObject)
    {
        return view('rgb_objects.edit', compact('rgbObject'));
    }

    // 🔹 8. Update an existing RGB object
    public function update(Request $request, RgbObject $rgbObject)
    {
        // Validate the updated input data
        $validatedData = $request->validate([
            'red' => 'required|integer|min:0|max:255',
            'green' => 'required|integer|min:0|max:255',
            'blue' => 'required|integer|min:0|max:255',
            'object_material' => 'required|string|max:255',
            'object_thickness' => 'nullable|string|max:255',
            'object_color' => 'required|string|max:255',
            'object_specific_data' => 'nullable|string',
        ]);

        // Update the RGB object with the validated data
        $rgbObject->update($validatedData);

        // Redirect back to the list of RGB objects with a success message
        return redirect()->route('rgb-objects.index')->with('success', 'RGB Object updated successfully!');
    }

    // 🔹 9. Delete a single RGB object
    public function destroy(RgbObject $rgbObject)
    {
        $rgbObject->delete(); // Delete the RGB object
        return redirect()->route('rgb-objects.index')->with('success', 'RGB Object deleted successfully!');
    }

    // 🔹 10. Analyze RGB logic (optional, unused here)
    private function analyzeRgb($r, $g, $b)
    {
        // Basic RGB color analysis for predefined color values
        if ($r > 200 && $g < 100 && $b < 100) {
            return [
                'color' => 'Red',
                'material' => 'Plastic',
                'thickness' => 'Thin',
                'specific' => 'Reflective',
            ];
        } elseif ($r < 100 && $g > 200 && $b < 100) {
            return [
                'color' => 'Green',
                'material' => 'Rubber',
                'thickness' => 'Medium',
                'specific' => 'Matte',
            ];
        } elseif ($r < 100 && $g < 100 && $b > 200) {
            return [
                'color' => 'Blue',
                'material' => 'Metal',
                'thickness' => 'Thick',
                'specific' => 'Shiny',
            ];
        }

        return [
            'color' => 'Unknown',
            'material' => 'Unknown',
            'thickness' => 'Unknown',
            'specific' => 'Unknown',
        ];
    }
}
