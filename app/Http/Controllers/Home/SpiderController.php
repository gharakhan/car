<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class SpiderController extends Controller
{
    public function token()
    {
        $links = public_path('files/links.txt');
        $lines = file($links);
        $count = 0;

        foreach($lines as $line) {
            set_time_limit(0);
            $regex = "(..............$)";
            $search = preg_split($regex,$line);
            $token = str_replace($search, '', $line) ;
            Place::firstOrCreate([
                'token' => $token,
            ],
                [
                    'token' => $token,
                ]);
        }
        unlink($links);
        return redirect()->to('/');
    }
}
