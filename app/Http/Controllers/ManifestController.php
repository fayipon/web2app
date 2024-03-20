<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\App;

class ManifestController extends Controller
{

    protected $obj;
    protected $icon_item;

    // 首頁
    public function index(Request $request) {


        $this->obj->name                = "名称";
        $this->obj->short_name          = "短名称";
        $this->obj->start_url           = "/";
        $this->obj->display             = "standalone";
        $this->obj->background_color    = "#ffffff";
        $this->obj->lang                = "en";
        $this->obj->scope               = "/";

        $this->obj->icons[0]->src = "https://w2app.s3.ap-southeast-1.amazonaws.com/20240312/846b5b205e49ad4.png";
        $this->obj->icons[0]->sizes = "192x192";
        $this->obj->icons[0]->type = "image/png";

        $this->obj->icons[1]->src = "https://playdl.goplaygooglezb8.com/images/512.jpg";
        $this->obj->icons[1]->sizes = "512x512";
        $this->obj->icons[1]->type = "image/png";

        echo json_encode($this->obj);
        exit();

    }

}

