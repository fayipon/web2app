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

    // 取得游戏名称
    public function getGameName(Request $request) {
        $gameData = [
            "dt" => [
                "31" => "Baccarat Deluxe"
            ],
            "err" => null
        ];

        return response()->json($gameData);
    }

    // 取得游戏内容
    public function getGameInfo(Request $request) {
        $json_str = '{
            "dt": {
              "fb": {
                "is": true,
                "bm": 100,
                "t": 0.6
              },
              "wt": {
                "mw": 3,
                "bw": 5,
                "mgw": 15,
                "smgw": 35
              },
              "maxwm": null,
              "cs": [
                0.03,
                0.1,
                0.3,
                0.9
              ],
              "ml": [
                1,
                2,
                3,
                4,
                5,
                6,
                7,
                8,
                9,
                10
              ],
              "mxl": 20,
              "bl": 100000,
              "inwe": false,
              "iuwe": false,
              "ls": {
                "si": {
                  "wp": null,
                  "lw": null,
                  "orl": [
                    8,
                    4,
                    7,
                    10,
                    1,
                    12,
                    2,
                    2,
                    2,
                    3,
                    3,
                    3,
                    1,
                    1,
                    1,
                    6,
                    11,
                    1,
                    2,
                    1,
                    9,
                    12,
                    7,
                    7,
                    4,
                    4,
                    1,
                    5,
                    5,
                    5,
                    12,
                    5,
                    11,
                    11,
                    6,
                    1
                  ],
                  "bwp": null,
                  "now": 7776,
                  "nowpr": [
                    6,
                    2,
                    6,
                    6,
                    3,
                    6
                  ],
                  "snww": null,
                  "esb": {
                    "1": [
                      6,
                      7,
                      8
                    ],
                    "2": [
                      9,
                      10,
                      11
                    ],
                    "3": [
                      24,
                      25
                    ],
                    "4": [
                      27,
                      28,
                      29
                    ]
                  },
                  "ebb": {
                    "1": {
                      "fp": 6,
                      "lp": 8,
                      "bt": 1,
                      "ls": 1
                    },
                    "2": {
                      "fp": 9,
                      "lp": 11,
                      "bt": 1,
                      "ls": 2
                    },
                    "3": {
                      "fp": 24,
                      "lp": 25,
                      "bt": 1,
                      "ls": 2
                    },
                    "4": {
                      "fp": 27,
                      "lp": 29,
                      "bt": 1,
                      "ls": 1
                    }
                  },
                  "es": {
                    "1": [
                      6,
                      7,
                      8
                    ],
                    "2": [
                      9,
                      10,
                      11
                    ],
                    "3": [
                      24,
                      25
                    ],
                    "4": [
                      27,
                      28,
                      29
                    ]
                  },
                  "eb": {
                    "1": {
                      "fp": 6,
                      "lp": 8,
                      "bt": 1,
                      "ls": 1
                    },
                    "2": {
                      "fp": 9,
                      "lp": 11,
                      "bt": 1,
                      "ls": 2
                    },
                    "3": {
                      "fp": 24,
                      "lp": 25,
                      "bt": 1,
                      "ls": 2
                    },
                    "4": {
                      "fp": 27,
                      "lp": 29,
                      "bt": 1,
                      "ls": 1
                    }
                  },
                  "rs": null,
                  "fs": null,
                  "ssaw": 0,
                  "ptbr": null,
                  "sc": 0,
                  "gwt": 0,
                  "fb": null,
                  "ctw": 0,
                  "pmt": null,
                  "cwc": 0,
                  "fstc": null,
                  "pcwc": 0,
                  "rwsp": null,
                  "hashr": null,
                  "ml": 2,
                  "cs": 0.3,
                  "rl": [
                    8,
                    4,
                    7,
                    10,
                    1,
                    12,
                    2,
                    2,
                    2,
                    3,
                    3,
                    3,
                    0,
                    0,
                    0,
                    6,
                    11,
                    1,
                    2,
                    0,
                    9,
                    12,
                    7,
                    7,
                    4,
                    4,
                    0,
                    5,
                    5,
                    5,
                    12,
                    5,
                    11,
                    11,
                    6,
                    1
                  ],
                  "sid": "0",
                  "psid": "0",
                  "st": 1,
                  "nst": 1,
                  "pf": 0,
                  "aw": 0,
                  "wid": 0,
                  "wt": "C",
                  "wk": "0_C",
                  "wbn": null,
                  "wfg": null,
                  "blb": 0,
                  "blab": 0,
                  "bl": 100000,
                  "tb": 0,
                  "tbb": 0,
                  "tw": 0,
                  "np": 0,
                  "ocr": null,
                  "mr": null,
                  "ge": null
                }
              },
              "cc": "PGC"
            },
            "err": null
          }';

          $configData = json_decode($json_str);
        return response()->json($configData);

    }

    // 得到初始化的牌面
    public function getResurceInfo(Request $request) {

    }

    // 投注结果
    public function getSpinInfo(Request $request) {
      $json_str = '{
        "dt": {
          "si": {
            "wp": null,
            "lw": null,
            "orl": [
              10,
              9,
              6,
              4,
              5,
              9,
              6,
              6,
              6,
              7,
              9,
              9,
              10,
              10,
              10,
              11,
              11,
              10,
              12,
              12,
              12,
              12,
              12,
              3,
              6,
              6,
              4,
              4,
              4,
              4,
              8,
              10,
              7,
              7,
              7,
              7
            ],
            "bwp": null,
            "now": 2916,
            "nowpr": [
              6,
              3,
              3,
              3,
              3,
              6
            ],
            "snww": null,
            "esb": {
              "1": [
                6,
                7,
                8
              ],
              "2": [
                10,
                11
              ],
              "3": [
                12,
                13,
                14
              ],
              "4": [
                15,
                16
              ],
              "5": [
                18,
                19
              ],
              "6": [
                20,
                21,
                22
              ],
              "7": [
                24,
                25
              ],
              "8": [
                26,
                27,
                28
              ]
            },
            "ebb": {
              "1": {
                "fp": 6,
                "lp": 8,
                "bt": 1,
                "ls": 2
              },
              "2": {
                "fp": 10,
                "lp": 11,
                "bt": 1,
                "ls": 2
              },
              "3": {
                "fp": 12,
                "lp": 14,
                "bt": 1,
                "ls": 2
              },
              "4": {
                "fp": 15,
                "lp": 16,
                "bt": 2,
                "ls": 1
              },
              "5": {
                "fp": 18,
                "lp": 19,
                "bt": 2,
                "ls": 1
              },
              "6": {
                "fp": 20,
                "lp": 22,
                "bt": 2,
                "ls": 1
              },
              "7": {
                "fp": 24,
                "lp": 25,
                "bt": 2,
                "ls": 1
              },
              "8": {
                "fp": 26,
                "lp": 28,
                "bt": 2,
                "ls": 1
              }
            },
            "es": {
              "1": [
                6,
                7,
                8
              ],
              "2": [
                10,
                11
              ],
              "3": [
                12,
                13,
                14
              ],
              "4": [
                15,
                16
              ],
              "5": [
                18,
                19
              ],
              "6": [
                20,
                21,
                22
              ],
              "7": [
                24,
                25
              ],
              "8": [
                26,
                27,
                28
              ]
            },
            "eb": {
              "1": {
                "fp": 6,
                "lp": 8,
                "bt": 1,
                "ls": 2
              },
              "2": {
                "fp": 10,
                "lp": 11,
                "bt": 1,
                "ls": 2
              },
              "3": {
                "fp": 12,
                "lp": 14,
                "bt": 1,
                "ls": 2
              },
              "4": {
                "fp": 15,
                "lp": 16,
                "bt": 2,
                "ls": 1
              },
              "5": {
                "fp": 18,
                "lp": 19,
                "bt": 2,
                "ls": 1
              },
              "6": {
                "fp": 20,
                "lp": 22,
                "bt": 2,
                "ls": 1
              },
              "7": {
                "fp": 24,
                "lp": 25,
                "bt": 2,
                "ls": 1
              },
              "8": {
                "fp": 26,
                "lp": 28,
                "bt": 2,
                "ls": 1
              }
            },
            "rs": null,
            "fs": null,
            "ssaw": 0,
            "ptbr": null,
            "sc": 0,
            "gwt": -1,
            "fb": null,
            "ctw": 0,
            "pmt": null,
            "cwc": 0,
            "fstc": null,
            "pcwc": 0,
            "rwsp": null,
            "hashr": "0:10;6;10;12;6;8#9;6;10;12;6;10#6;6;10;12;4;7#4;7;11;12;4;7#5;9;11;12;4;7#9;9;10;3;4;7#MV#12.0#MT#1#MG#0#",
            "ml": 2,
            "cs": 0.3,
            "rl": [
              10,
              9,
              6,
              4,
              5,
              9,
              6,
              6,
              6,
              7,
              9,
              9,
              10,
              10,
              10,
              11,
              11,
              10,
              12,
              12,
              12,
              12,
              12,
              3,
              6,
              6,
              4,
              4,
              4,
              4,
              8,
              10,
              7,
              7,
              7,
              7
            ],
            "sid": "1772822014693670400",
            "psid": "1772822014693670400",
            "st": 1,
            "nst": 1,
            "pf": 1,
            "aw": 0,
            "wid": 0,
            "wt": "C",
            "wk": "0_C",
            "wbn": null,
            "wfg": null,
            "blb": 100000,
            "blab": 99988,
            "bl": 99988,
            "tb": 12,
            "tbb": 12,
            "tw": 0,
            "np": -12,
            "ocr": null,
            "mr": null,
            "ge": [
              1,
              11
            ]
          }
        },
        "err": null
      }';
      
      $spinData = json_decode($json_str);
      return response()->json($spinData);

    }


}

