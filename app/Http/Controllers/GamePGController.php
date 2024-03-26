<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;

use App\Models\App;

class GamePGController extends Controller
{
    // verifySession
    public function verifySession(Request $request) {
    	
        $data = [
            "dt" => [
                "oj" => [
                    "jid" => 1
                ],
                "pid" => "0",
                "pcd" => "",
                "tk" => "A1D7F48C-2716-43A4-9F9F-D8E70695D454",
                "st" => 1,
                "geu" => "https://api.chjdhbyk.top/game-api/gem-saviour-conquest/",
                "lau" => "https://api.chjdhbyk.top/game-api/lobby/",
                "bau" => "https://api.chjdhbyk.top/web-api/game-proxy/",
                "cc" => "PGC",
                "cs" => "",
                "nkn" => "",
                "gm" => [
                    [
                        "gid" => 62,
                        "msdt" => 1569826199000,
                        "medt" => 1569826199000,
                        "st" => 1,
                        "amsg" => ""
                    ]
                ],
                "uiogc" => [
                    "bb" => 1,
                    "grtp" => 0,
                    "gec" => 1,
                    "cbu" => 0,
                    "cl" => 0,
                    "bf" => 0,
                    "mr" => 0,
                    "phtr" => 0,
                    "vc" => 0,
                    "bfbsi" => 0,
                    "bfbli" => 0,
                    "il" => 0,
                    "rp" => 0,
                    "gc" => 0,
                    "ign" => 0,
                    "tsn" => 0,
                    "we" => 0,
                    "gsc" => 1,
                    "bu" => 0,
                    "pwr" => 0,
                    "hd" => 0,
                    "et" => 0,
                    "np" => 0,
                    "igv" => 0,
                    "as" => 0,
                    "asc" => 0,
                    "std" => 0,
                    "hnp" => 0,
                    "ts" => 0,
                    "smpo" => 0,
                    "grt" => 0,
                    "ivs" => 0,
                    "ir" => 0,
                    "gvs" => 0,
                    "hn" => 1
                ],
                "ec" => [],
                "occ" => [
                    "rurl" => "",
                    "tcm" => "You are playing Demo.",
                    "tsc" => 1000000,
                    "ttp" => 43200,
                    "tlb" => "Continue",
                    "trb" => "Quit"
                ],
                "gcv" => "2.2.0.4",
                "ioph" => "6a750b7cdbaf"
            ],
            "err" => null
        ];

        return response()->json($data);
    }

    
    public function get()
    {
        $config = [
            "dt" => [
                "fb" => [
                    "is" => true,
                    "bm" => 100,
                    "t" => 0.6
                ],
                "wt" => [
                    "mw" => 3,
                    "bw" => 5,
                    "mgw" => 15,
                    "smgw" => 35
                ],
                // 继续添加其他键值对
            ],
            "err" => null
        ];

        return response()->json($config);
    }

}

