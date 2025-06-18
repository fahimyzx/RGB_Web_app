<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function index()
    {
        $data = SensorData::all();
        return view('sensor_data.index', compact('data'));
    }

    public function create()
    {
        return view('sensor_data.create');
    }

    public function store(Request $request)
    {
        // Validate RGB input
        $request->validate([
            'red' => 'required|integer|between:0,255',
            'green' => 'required|integer|between:0,255',
            'blue' => 'required|integer|between:0,255',
        ]);

        // Basic color detection
        $colorName = $this->detectColor($request->red, $request->green, $request->blue);

        // For now, material is unknown or default
        $material = 'Unknown';

        // Save data
        SensorData::create([
            'red' => $request->red,
            'green' => $request->green,
            'blue' => $request->blue,
            'color_name' => $colorName,
            'material' => $material,
        ]);

        return redirect()->route('sensor-data.index')->with('success', 'Sensor data saved!');
    }

    private function detectColor($r, $g, $b)
    {
        if ($r > $g && $r > $b) {
            return 'Red';
        } elseif ($g > $r && $g > $b) {
            return 'Green';
        } elseif ($b > $r && $b > $g) {
            return 'Blue';
        } else {
            return 'Unknown';
        }
    }
}
