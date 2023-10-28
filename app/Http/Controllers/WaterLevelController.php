<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaterLevelController extends Controller
{
    //
}
// app/Http/Controllers/WaterLevelController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaterLevel;

class WaterLevelController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request data (optional but recommended)
        $validatedData = $request->validate([
            'water_level' => 'required|numeric',
        ]);

        // Save water level to the database
        WaterLevel::create([
            'level' => $validatedData['water_level'],
            'measured_at' => now(),
        ]);

        return response()->json(['message' => 'Water level data stored successfully'], 200);
    }
}
