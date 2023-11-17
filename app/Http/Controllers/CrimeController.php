<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class CrimeController extends Controller
{
    public function addCrime(Request $request): Collection
    {

        $allProperties = $request->all();

        $videos = array_filter($allProperties, function ($value, $key) {return str_contains($key, 'video');}, ARRAY_FILTER_USE_BOTH);

        $videoNames = '';
        $videoValues = array_values($videos);

        foreach ($videoValues as $video) {

            $videoName = time().$video->getClientOriginalName();

            $video->storeAs('videos', $videoName, 'public');

            $videoNames = $videoNames .','. $videoName;

        }



        $images = array_filter($allProperties, function ($value, $key) {
            return str_contains($key, 'image');}, ARRAY_FILTER_USE_BOTH);

        $imageNames = '';
        $imageValues = array_values($images);

        foreach ($imageValues as $image) {

            $imageName = time().$image->getClientOriginalName();

            $image->storeAs('images', $imageName, 'public');

            $imageNames = $imageNames .','. $imageName;

        }



        $audios = array_filter($allProperties, function ($value, $key) {
            return str_contains($key, 'audio');}, ARRAY_FILTER_USE_BOTH);

        $audioNames = '';
        $audioValues = array_values($audios);

        foreach ($audioValues as $audio) {

            $audioName = time().$audio->getClientOriginalName();

            $audio->storeAs('audios', $audioName, 'public');

            $audioNames = $audioNames .','. $audioName;

        }


        $documents = array_filter($allProperties, function ($value, $key) {
            return str_contains($key, 'document');}, ARRAY_FILTER_USE_BOTH);

        $documentNames = '';
        $documentValues = array_values($documents);

        foreach ($documentValues as $document) {

            $documentName = time().$document->getClientOriginalName();

            $document->storeAs('documents', $documentName, 'public');

            $documentNames = $documentNames .','. $documentName;

        }


        Crime::create([
            'type_id' => (int)$request->type,
            'reporter_name' => $request->reporter_name,
            'county_id' => (int)$request->county_id,
            'town' => $request->town,
            'building' => $request->building,
            'suspect_no'  => $request->suspect_no,
            'evidence_link' => $request->evidence_link,
            'videos' => substr($videoNames, 1),
            'audios' => substr($audioNames, 1),
            'documents'  => substr($documentNames, 1),
            'images' => substr($imageNames, 1)
        ]);


        return Crime::all();

    }

    public function getCrimes(Request $request): Collection
    {
        return Crime::all();
    }

}
