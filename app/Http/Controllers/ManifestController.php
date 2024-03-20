<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\App;

class ManifestController extends Controller
{

    // 首頁
    public function index(Request $request) {


        $input = $this->getRequest($request);

        ///////////////////////////////////

        $return = App::where("ID",$input['id'])->first();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/');
        }


        $manifestData = new \stdClass();

        $manifestData->name                = $return['APP_NAME'];
        $manifestData->short_name          = $return['APP_SORT_NAME'];
        $manifestData->start_url           = "/myapp/" . $return['ID'];
        $manifestData->display             = "standalone";
        $manifestData->background_color    = "#ffffff";
        $manifestData->lang                = "en";
        $manifestData->scope               = "/";

        // icon
        $icon1 = new \stdClass();
        $icon1->src = $return['APP_SETUP_ICON'];
        $icon1->sizes = "192x192";
        $icon1->type = "image/png";
        $manifestData->icons[] = $icon1;
        
        $icon2 = new \stdClass();
        $icon2->src = $return['APP_DESKTOP_ICON'];
        $icon2->sizes = "512x512";
        $icon2->type = "image/png";
        $manifestData->icons[] = $icon2;

        header('Content-Type: application/json');
        echo json_encode($manifestData);
        exit();

    }

}

