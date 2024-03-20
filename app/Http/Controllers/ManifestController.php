<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\App;

class ManifestController extends Controller
{
    // 首頁
    public function index(Request $request) {


        $data = array();
        $data['name'] = "名称";
        $data['short_name'] = "短名称";
        $data['start_url'] = "/";
        $data['display'] = "standalone";
        $data['background_color'] = "#ffffff";
        $data['lang'] = "en";
        $data['scope'] = "/";
    }

}

