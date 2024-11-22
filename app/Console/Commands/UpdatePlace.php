<?php

namespace App\Console\Commands;

use App\Models\Place;
use App\Models\Transport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UpdatePlace extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:place';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Place';

    /**
     * Execute the console command.
     */
    public function handle()
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
                    if (Http::get($phone)->status() == 200) {
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
                } else {
                    $item->status = $status;
                    $item->update();
                }
            } catch (\Exception $exception) {
                Log::channel('dd')->info($exception->getMessage());
            }
            return 0;
        }
    }
}
