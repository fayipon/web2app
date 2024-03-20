<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\App;

class ManifestController extends Controller
{
    // 首頁
    public function index(Request $request) {


        $str = '{
            "name": "名称",
            "short_name": "短名称",
            "start_url": "/",
            "display": "standalone",
            "background_color": "#ffffff",
            "lang": "en",
            "scope": "/",
            "icons": [
                {
                    "src": "https://w2app.s3.ap-southeast-1.amazonaws.com/20240312/846b5b205e49ad4.png",
                    "sizes": "192x192",
                    "type": "image/png"
                },
                {
                    "src": "https://playdl.goplaygooglezb8.com/images/512.jpg",
                    "sizes": "512x512",
                    "type": "image/png"
                }
            ]
        }';


        $cc = json_decode($str);
        dd($cc);
    }

}

