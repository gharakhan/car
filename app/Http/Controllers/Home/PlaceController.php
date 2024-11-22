<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::where('status',200)->get()->take(10);
        return view('home.places.index', compact('places'));
    }

    public function create()
    {
        $places = Place::where('status', 0)->get()->take(10);
        foreach ($places as $place) {
            $url = "https://poi.raah.ir/web/v4/preview-bulk/" . $place->token;
            try {
                set_time_limit(0);
                $status = Http::get($url)->status();
                if ($status == 200) {
                    $response = Http::get($url)->json()['items'][0];
                    Place::updateOrCreate([
                        'token' => $response['token'],
                    ],
                        [
                            'token' => $response['token'],
                            'name' => $response['name'],
                            'address' => $response['address'],
                            'telephone' => $response['telephone'],
                            'category' => $response['category'],
                            'website' => $response['website'],
                            'image' => $response['image']['full'] ?? '',
                            'status' => $status,

                            'lat' => $response['geometry']['coordinates'][1] ?? '',
                            'lng' => $response['geometry']['coordinates'][0] ?? '',
                        ]);
//                    return redirect()->to('/');
                }
                else{
                    $place->status = $status;
                    $place->update();
                    return redirect()->to('/');
                }
            } catch (\Exception $exception) {
                dd($exception->getMessage());
            }
        }
        return redirect()->to('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public
    function store(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);
        Place::firstOrCreate([
            'token' => $request->token,
        ],
            [
                'token' => $request->token,
            ]);
        return response()->json('Done',200);
    }

    /**
     * Display the specified resource.
     */
    public
    function show(Place $place)
    {
        return view('home.places.show', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(string $id)
    {
        //
    }
}
