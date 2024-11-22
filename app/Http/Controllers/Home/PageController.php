<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\Transport;
use DOMXPath;
use Illuminate\Http\Request;
use DOMDocument;
class PageController extends Controller
{
    public function index()
    {
        $transports = Transport::where('status', 200)->get();
        return view('home.pages.index', compact('transports'));
    }

    public function test()
    {
        // store URL in php variable
        $fetchurl = "https://www.varzesh3.com/";
        // get URL content using file_get_contents function and store content in php variable
        $urlContent = file_get_contents($fetchurl);

        $dom = new DOMDocument();
        @$dom->loadHTML($urlContent);

        //Get all links. You could also use any other tag name here,
        //like 'img' or 'table', to extract other tags.
        $hrefs = $dom->getElementsByTagName('a');

        //Iterate over the extracted links and display their URLs
        foreach ($hrefs as $link){
            $url = $link->getAttribute('href');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            Link::updateOrCreate([
                'name' => $url,
            ],
                [
                    'name' => $url,
                ]);
            // fetch the anchor tag text in case if extracting href attribute
            $link_title = $link->nodeValue;
            if(!filter_var($url, FILTER_VALIDATE_URL) === false){
                $urlsList = '<li><a href="'.$url.'" target="_blank">'.$url.'</a></li>';
            }
        }
        dd(1);
    }
}
