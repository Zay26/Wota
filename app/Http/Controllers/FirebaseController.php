<?php

namespace App\Http\Controllers;

use Kreait\Firebase;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{

    public function readRealtimeDatabase()
{
    // Initialize Firebase Admin SDK
    $serviceAccount = ServiceAccount::fromJsonFile('esp32-firebase-demo-f33e6-firebase-adminsdk-g98ef-cf8a92cdca.json');
    $firebase = (new Factory)
    ->withDatabaseUri('https://esp32-firebase-demo-f33e6-default-rtdb.firebaseio.com')
        ->withServiceAccount($serviceAccount)
        ->create();

    // Get a reference to the Realtime Database
    $database = $firebase->getDatabase();

    // Replace 'your_database_path' with the actual path to the data in your Realtime Database
    $reference = $database->getReference('https://esp32-firebase-demo-f33e6-default-rtdb.firebaseio.com');

    // Retrieve the data from the Realtime Database
    $snapshot = $reference->getSnapshot();

    // Convert the snapshot to an associative array
    $data = $snapshot->getValue();

    return response()->json($data);
    // Send the data to the backend using an HTTP request
    $url = 'http://localhost/data2';
    $dataToSend = ['waterlevelData' => $data];

    // Use Laravel's HTTP client to send the data to the backend
    $response = \Illuminate\Support\Facades\Http::post($url, $dataToSend);

    // Check the response status and handle accordingly
    if ($response->successful()) {
        return response()->json(['message' => 'Data sent to backend successfully'], 200);
    } else {
        return response()->json(['message' => 'Failed to send data to backend'], 500);
    }
}

}