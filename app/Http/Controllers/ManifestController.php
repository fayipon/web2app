<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\App;

class ManifestController extends Controller
{

    // 首頁
    public function index(Request $request) {


        $manifestData = new stdClass();

        $manifestData->name                = "名称";
        $manifestData->short_name          = "短名称";
        $manifestData->start_url           = "/";
        $manifestData->display             = "standalone";
        $manifestData->background_color    = "#ffffff";
        $manifestData->lang                = "en";
        $manifestData->scope               = "/";

        $manifestData->icons[0]->src = "https://w2app.s3.ap-southeast-1.amazonaws.com/20240312/846b5b205e49ad4.png";
        $manifestData->icons[0]->sizes = "192x192";
        $manifestData->icons[0]->type = "image/png";

        $manifestData->icons[1]->src = "https://playdl.goplaygooglezb8.com/images/512.jpg";
        $manifestData->icons[1]->sizes = "512x512";
        $manifestData->icons[1]->type = "image/png";

        header('Content-Type: application/json');
        echo json_encode($manifestData);
        exit();

    }

}

