<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Firestore;
use Kreait\Firebase\ServiceAccount;

class FirestoreController extends Controller
{
    // Your readFirestoreData function goes hee
    public function readFirestoreData()
{
    // Get the Firestore instance
    $firestore = app('firebase.firestore');

    // Replace 'your_collection_name' with the actual name of the collection in your Firestore database
    $collection = $firestore->database()->collection('your_collection_name');

    $documents = $collection->documents();

    $data = [];

    foreach ($documents as $document) {
        $data[] = [
            'id' => $document->id(),
            'data' => $document->data(),
        ];
    }

    return response()->json($data);
}

}
