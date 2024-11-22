<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transports = Transport::where('status',200)->get()->take(10);
        return view('home.transports.index', compact('transports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Transport::where('status', 0)->get()->take(1);
        foreach ($items as $item) {
            $url = "https://bama.ir/cad/api/detail/" . $item->token;
            $phone = "https://bama.ir/cad/api/detail/" . $item->token . '/phone';
            try {
                set_time_limit(0);
                $status = Http::get($url)->status();
                if ($status == 200) {
                    $response = Http::get($url)->json()['data']['detail'];
                    if (Http::get($phone)->status() == 200){
                        $mobile = Http::get($phone)->json()['data']['mobile'][0] ?? 0;
                    }
                    Transport::updateOrCreate([
                        'token' => $response['code'],
                    ],
                        [
                            'token' => $response['code'],
                            'mobile' => $mobile ?? 0,
                            'title' => $response['title'],
                            'subtitle' => $response['subtitle'],
                            'type' => $response['type'],
                            'trim' => $response['trim'],
                            'time' => $response['time'],
                            'year' => $response['year'],
                            'location' => $response['location'],
                            'mileage' => $response['mileage'],
                            'transmission' => $response['transmission'],
                            'fuel' => $response['fuel'],
                            'color' => $response['color'],
                            'body_status' => $response['body_status'],
                            'description' => $response['description'],
                            'province' => $response['province'],
                            'price' => $response['price']['price'] ?? 0,
                            'images' => $response['images'] ?? '',
                            'status' => $status,
                        ]);
                }
                else{
                    dd($status);
                    $item->status = $status;
                    $item->update();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
