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

    // 取得游戏名称 (意味不明)
    public function getGameName(Request $request) {
        $gameData = [
            "dt" => [
                "31" => "Baccarat Deluxe"
            ],
            "err" => null
        ];

        return response()->json($gameData);
    }

    // 意味不明  
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
              "bl": 999999.00,
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

      $json_str = '{
        "dt": [
          {
            "rid": 0,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/0/default_icon-f63c84ba.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 2,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/2/GemSaviour_168x168-ab06cffe.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 3,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/3/FortuneGods_168x168-3aff733d.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 6,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/6/Medusa2_168x168-2a9f180b.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 7,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/7/Medusa1_168x168-d4608fed.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 18,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/18/HoodWolf_168x168-843c442f.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 24,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/24/WinWinWon_168x168-913cf3ef.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 25,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/25/PlushieFrenzy_168x168-ab029c99.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 26,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/26/TreeofFortune_168x168-631774c6.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 28,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/28/Hotpot_168x168-d59cd564.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 29,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/29/DragonLegend_168x168-91db6a15.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 31,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/31/BaccaratDeluxe_168x168-d60abb20.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 33,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/33/HipHopPanda_168x168-15547bc6.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 34,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/34/LegendofHouYi_168x168-13f58e2b.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 35,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/35/Mr.Hallow_168x168-d9bf8dcf.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 36,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/36/ProsperityLion_168x168_-92038410.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 37,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/37/SantasGiftRush_168x168-c54bc748.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 38,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/38/GemSaviourSword_168x168-e0c2f395.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 39,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/39/PiggyGold_168x168-7c105c37.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 40,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/40/JungleDelight_168x168-5c2bb748.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 41,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/41/SymbolsofEgypt_168x168-29fa097f.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 42,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/42/GaneshaGold_168x168-cdedd446.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 44,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/44/EmperorsFavour_168x168-fea2651e.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 48,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/48/DoubleFortune_168x168-8e865d56.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 50,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/50/JourneytotheWealth_168x168-5eb1be65.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 53,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/53/TheGreatIcescape_168x168_-507c8898.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 54,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/54/CaptainsBounty_168x168-f50bc63d.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 59,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/59/NinjavsSamurai_168x168-e2a52085.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 60,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/60/LeprechaunRiches_168x168-0b05dc84.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 61,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/61/FlirtingScholar_168x168-03cb5d2d.png",
            "l": "en-US",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 0,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/0/default_icon-f63c84ba.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 1,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/1/HoneyTrap_of_DiaoChan_168x168-b93b8e16.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 2,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/2/GemSaviour_168x168-ab06cffe.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 3,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/3/FortuneGods_168x168-3aff733d.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 6,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/6/Medusa2_168x168-2a9f180b.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 7,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/7/Medusa1_168x168-d4608fed.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:09"
          },
          {
            "rid": 18,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/18/HoodWolf_168x168-843c442f.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 24,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/24/WinWinWon_168x168-913cf3ef.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 25,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/25/PlushieFrenzy_168x168-ab029c99.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 26,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/26/TreeofFortune_168x168-631774c6.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 28,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/28/Hotpot_168x168-d59cd564.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 29,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/29/DragonLegend_168x168-91db6a15.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 31,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/31/BaccaratDeluxe_168x168-d60abb20.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 33,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/33/HipHopPanda_168x168-15547bc6.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 34,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/34/LegendofHouYi_168x168-13f58e2b.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 35,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/35/Mr.Hallow_168x168-d9bf8dcf.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 36,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/36/ProsperityLion_168x168_-92038410.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 37,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/37/SantasGiftRush_168x168-c54bc748.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 38,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/38/GemSaviourSword_168x168-e0c2f395.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 39,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/39/PiggyGold_168x168-7c105c37.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 40,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/40/JungleDelight_168x168-5c2bb748.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 41,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/41/SymbolsofEgypt_168x168-29fa097f.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 42,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/42/GaneshaGold_168x168-cdedd446.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 44,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/44/EmperorsFavour_168x168-fea2651e.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 48,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/48/DoubleFortune_168x168-8e865d56.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 50,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/50/JourneytotheWealth_168x168-5eb1be65.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 53,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/53/TheGreatIcescape_168x168_-507c8898.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 54,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/54/CaptainsBounty_168x168-f50bc63d.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 59,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/59/NinjavsSamurai_168x168-e2a52085.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 61,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/61/FlirtingScholar_168x168-03cb5d2d.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 60,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/60/LeprechaunRiches_168x168-0b05dc84.png",
            "l": "zh-CN",
            "ut": "2019-09-27T10:57:10"
          },
          {
            "rid": 62,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/62/GemSaviourConquest_168x168-3bff30bd.png",
            "l": "zh-CN",
            "ut": "2019-09-30T04:54:27"
          },
          {
            "rid": 62,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/62/GemSaviourConquest_168x168-3bff30bd.png",
            "l": "en-US",
            "ut": "2019-09-30T04:54:27"
          },
          {
            "rid": 64,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/64/MuayThai_168x168-8638e0c1.png",
            "l": "zh-CN",
            "ut": "2019-10-01T12:08:20"
          },
          {
            "rid": 64,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/64/MuayThai_168x168-8638e0c1.png",
            "l": "en-US",
            "ut": "2019-10-01T12:08:21"
          },
          {
            "rid": 63,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/63/DragonTigerLuck_168x168-5894f51d.png",
            "l": "zh-CN",
            "ut": "2019-10-03T08:07:13"
          },
          {
            "rid": 63,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/63/DragonTigerLuck_168x168-5894f51d.png",
            "l": "en-US",
            "ut": "2019-10-03T08:07:13"
          },
          {
            "rid": 65,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/65/MahjongWays_168x168-cc7e08cc.png",
            "l": "zh-CN",
            "ut": "2019-10-18T09:33:17"
          },
          {
            "rid": 20,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/20/ReelLove_168x168-5038627d.png",
            "l": "zh-CN",
            "ut": "2019-11-22T04:42:03"
          },
          {
            "rid": 20,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/20/ReelLove_168x168-5038627d.png",
            "l": "en-US",
            "ut": "2019-11-22T04:42:03"
          },
          {
            "rid": 57,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/57/DragonHatch_168x168-456337e5.png",
            "l": "zh-CN",
            "ut": "2019-12-16T08:30:33"
          },
          {
            "rid": 57,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/57/DragonHatch_168x168-456337e5.png",
            "l": "en-US",
            "ut": "2019-12-16T08:30:33"
          },
          {
            "rid": 68,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/68/FortuneMouse_168x168-47dbb338.png",
            "l": "zh-CN",
            "ut": "2019-12-27T09:28:28"
          },
          {
            "rid": 68,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/68/FortuneMouse_168x168-47dbb338.png",
            "l": "en-US",
            "ut": "2019-12-27T09:28:29"
          },
          {
            "rid": 70,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/70/Candy Burst 168x168.png",
            "l": "zh-CN",
            "ut": "2020-02-13T09:58:37"
          },
          {
            "rid": 70,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/70/Candy Burst 168x168.png",
            "l": "en-US",
            "ut": "2020-02-13T09:58:37"
          },
          {
            "rid": 71,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/71/caishen-wins_168_168-86186b0c.png",
            "l": "zh-CN",
            "ut": "2020-02-19T02:50:48"
          },
          {
            "rid": 71,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/71/caishen-wins_168_168-86186b0c.png",
            "l": "en-US",
            "ut": "2020-02-19T02:50:48"
          },
          {
            "rid": 67,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/67/ShaolinSoccer_168x168-35282522.png",
            "l": "zh-CN",
            "ut": "2020-02-19T03:15:29"
          },
          {
            "rid": 67,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/67/ShaolinSoccer_168x168-35282522.png",
            "l": "en-US",
            "ut": "2020-02-19T03:15:29"
          },
          {
            "rid": 74,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/74/MahjongWaysTwo_168x168-1e5dbeee.png",
            "l": "zh-CN",
            "ut": "2020-03-06T08:37:45"
          },
          {
            "rid": 74,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/74/MahjongWaysTwo_168x168-1e5dbeee.png",
            "l": "en-US",
            "ut": "2020-03-06T08:37:45"
          },
          {
            "rid": 69,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/69/BikiniParadise_168x168-663109e3.png",
            "l": "zh-CN",
            "ut": "2020-03-19T09:46:20"
          },
          {
            "rid": 73,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/73/EgyptsBook_168_168-6ff312b3.png",
            "l": "zh-CN",
            "ut": "2020-04-07T10:20:11"
          },
          {
            "rid": 73,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/73/EgyptsBook_168_168-6ff312b3.png",
            "l": "en-US",
            "ut": "2020-04-07T10:20:11"
          },
          {
            "rid": 75,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/75/GaneshaFortune_168_168-8c160aaa.png",
            "l": "zh-CN",
            "ut": "2020-04-14T06:57:08"
          },
          {
            "rid": 75,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/75/GaneshaFortune_168_168-8c160aaa.png",
            "l": "en-US",
            "ut": "2020-04-14T06:57:08"
          },
          {
            "rid": 82,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/82/SGS-e7840b27.png",
            "l": "zh-CN",
            "ut": "2020-05-28T02:37:39"
          },
          {
            "rid": 82,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/82/SGS-e7840b27.png",
            "l": "en-US",
            "ut": "2020-05-28T02:37:39"
          },
          {
            "rid": 79,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/79/SGS-ea3acc20.png",
            "l": "zh-CN",
            "ut": "2020-06-03T07:50:47"
          },
          {
            "rid": 79,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/79/SGS-ea3acc20.png",
            "l": "en-US",
            "ut": "2020-06-03T07:50:47"
          },
          {
            "rid": 83,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/83/SGS-215874f9.png",
            "l": "zh-CN",
            "ut": "2020-06-16T01:50:12"
          },
          {
            "rid": 83,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/83/SGS-215874f9.png",
            "l": "en-US",
            "ut": "2020-06-16T01:50:12"
          },
          {
            "rid": 85,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/85/SGS-b0340781.png",
            "l": "zh-CN",
            "ut": "2020-07-06T09:33:28"
          },
          {
            "rid": 80,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/80/SGS-eab4819f.png",
            "l": "zh-CN",
            "ut": "2020-07-08T08:39:10"
          },
          {
            "rid": 80,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/80/SGS-eab4819f.png",
            "l": "en-US",
            "ut": "2020-07-08T08:39:10"
          },
          {
            "rid": 84,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/84/SGS-88a1b15b.png",
            "l": "zh-CN",
            "ut": "2020-07-17T02:34:13"
          },
          {
            "rid": 84,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/84/SGS-88a1b15b.png",
            "l": "en-US",
            "ut": "2020-07-17T02:34:13"
          },
          {
            "rid": 92,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/92/SGS-6814e138.png",
            "l": "zh-CN",
            "ut": "2020-07-24T03:40:00"
          },
          {
            "rid": 69,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/69/BikiniParadise_168x168-663109e3.png",
            "l": "en-US",
            "ut": "2020-07-24T07:57:50"
          },
          {
            "rid": 85,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/85/SGS-b0340781.png",
            "l": "en-US",
            "ut": "2020-07-27T11:08:59"
          },
          {
            "rid": 65,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/65/MahjongWays_168x168-cc7e08cc.png",
            "l": "en-US",
            "ut": "2020-07-27T13:51:59"
          },
          {
            "rid": 86,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/86/SGS-98a0a8a5.png",
            "l": "zh-CN",
            "ut": "2020-07-28T12:03:48"
          },
          {
            "rid": 86,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/86/SGS-98a0a8a5.png",
            "l": "en-US",
            "ut": "2020-07-28T12:03:48"
          },
          {
            "rid": 87,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/87/SGS-a63b7158.png",
            "l": "zh-CN",
            "ut": "2020-07-29T09:47:50"
          },
          {
            "rid": 87,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/87/SGS-a63b7158.png",
            "l": "en-US",
            "ut": "2020-07-29T09:47:50"
          },
          {
            "rid": 58,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/58/SGS-777a1211.png",
            "l": "zh-CN",
            "ut": "2020-08-07T08:05:18"
          },
          {
            "rid": 58,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/58/SGS-777a1211.png",
            "l": "en-US",
            "ut": "2020-08-07T08:05:18"
          },
          {
            "rid": 90,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/90/SGS-aa9b055c.png",
            "l": "zh-CN",
            "ut": "2020-08-21T07:12:00"
          },
          {
            "rid": 90,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/90/SGS-aa9b055c.png",
            "l": "en-US",
            "ut": "2020-08-21T07:12:00"
          },
          {
            "rid": 92,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/92/SGS-6814e138.png",
            "l": "en-US",
            "ut": "2020-09-01T03:51:33"
          },
          {
            "rid": 93,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/93/SGS-b30b213e.png",
            "l": "zh-CN",
            "ut": "2020-09-17T03:34:59"
          },
          {
            "rid": 93,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/93/SGS-b30b213e.png",
            "l": "en-US",
            "ut": "2020-09-17T03:34:59"
          },
          {
            "rid": 88,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/88/SGS-0d34a88c.png",
            "l": "zh-CN",
            "ut": "2020-09-28T09:10:25"
          },
          {
            "rid": 88,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/88/SGS-0d34a88c.png",
            "l": "en-US",
            "ut": "2020-09-28T09:10:25"
          },
          {
            "rid": 97,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/97/SGS-bb7bb55f.png",
            "l": "zh-CN",
            "ut": "2020-09-29T07:32:56"
          },
          {
            "rid": 97,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/97/SGS-bb7bb55f.png",
            "l": "en-US",
            "ut": "2020-09-29T07:32:56"
          },
          {
            "rid": 94,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/94/SGS-0f58b776.png",
            "l": "zh-CN",
            "ut": "2020-09-29T07:33:48"
          },
          {
            "rid": 94,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/94/SGS-0f58b776.png",
            "l": "en-US",
            "ut": "2020-09-29T07:33:48"
          },
          {
            "rid": 101,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/101/SGS-cc58800d.png",
            "l": "zh-CN",
            "ut": "2020-10-08T08:03:23"
          },
          {
            "rid": 101,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/101/SGS-cc58800d.png",
            "l": "en-US",
            "ut": "2020-10-08T08:03:23"
          },
          {
            "rid": 98,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/98/SGS-1055ea51.png",
            "l": "zh-CN",
            "ut": "2020-10-09T07:08:00"
          },
          {
            "rid": 98,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/98/SGS-1055ea51.png",
            "l": "en-US",
            "ut": "2020-10-09T07:08:00"
          },
          {
            "rid": 102,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/102/SGS-91d7bdd3.png",
            "l": "zh-CN",
            "ut": "2020-10-12T09:13:27"
          },
          {
            "rid": 102,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/102/SGS-91d7bdd3.png",
            "l": "en-US",
            "ut": "2020-10-12T09:13:27"
          },
          {
            "rid": 103,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/103/SGS-e98163a9.png",
            "l": "zh-CN",
            "ut": "2020-10-14T03:09:00"
          },
          {
            "rid": 100,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/100/SGS-21100faf.png",
            "l": "zh-CN",
            "ut": "2020-10-14T03:32:54"
          },
          {
            "rid": 100,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/100/SGS-21100faf.png",
            "l": "en-US",
            "ut": "2020-10-14T03:32:54"
          },
          {
            "rid": 89,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/89/SGS-9bd8e453.png",
            "l": "zh-CN",
            "ut": "2020-10-16T08:24:50"
          },
          {
            "rid": 89,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/89/SGS-9bd8e453.png",
            "l": "en-US",
            "ut": "2020-10-16T08:24:50"
          },
          {
            "rid": 95,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/95/SGS-8722e77b.png",
            "l": "zh-CN",
            "ut": "2020-10-20T10:39:00"
          },
          {
            "rid": 95,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/95/SGS-8722e77b.png",
            "l": "en-US",
            "ut": "2020-10-20T10:39:00"
          },
          {
            "rid": 91,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/91/SGS-e39408d8.png",
            "l": "zh-CN",
            "ut": "2020-10-28T08:24:12"
          },
          {
            "rid": 91,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/91/SGS-e39408d8.png",
            "l": "en-US",
            "ut": "2020-10-28T08:24:12"
          },
          {
            "rid": 105,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/105/SGS-27954eca.png",
            "l": "zh-CN",
            "ut": "2020-10-28T10:32:33"
          },
          {
            "rid": 105,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/105/SGS-27954eca.png",
            "l": "en-US",
            "ut": "2020-10-28T10:32:33"
          },
          {
            "rid": 104,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/104/SGS-6d855692.png",
            "l": "zh-CN",
            "ut": "2020-10-28T10:32:33"
          },
          {
            "rid": 104,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/104/SGS-6d855692.png",
            "l": "en-US",
            "ut": "2020-10-28T10:32:33"
          },
          {
            "rid": 106,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/106/SGS-ab10c5f2.png",
            "l": "zh-CN",
            "ut": "2020-11-09T07:35:04"
          },
          {
            "rid": 106,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/106/SGS-ab10c5f2.png",
            "l": "en-US",
            "ut": "2020-11-09T07:35:04"
          },
          {
            "rid": 107,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/107/SGS-1834c440.png",
            "l": "zh-CN",
            "ut": "2020-11-09T07:35:04"
          },
          {
            "rid": 107,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/107/SGS-1834c440.png",
            "l": "en-US",
            "ut": "2020-11-09T07:35:04"
          },
          {
            "rid": 108,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/108/SGS-466aef35.png",
            "l": "zh-CN",
            "ut": "2020-12-01T03:24:24"
          },
          {
            "rid": 108,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/108/SGS-466aef35.png",
            "l": "en-US",
            "ut": "2020-12-01T03:24:24"
          },
          {
            "rid": 103,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/103/SGS-e98163a9.png",
            "l": "en-US",
            "ut": "2021-01-11T04:04:58"
          },
          {
            "rid": 112,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/112/SGS-0538c773.png",
            "l": "zh-CN",
            "ut": "2021-01-21T02:38:33"
          },
          {
            "rid": 112,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/112/SGS-0538c773.png",
            "l": "en-US",
            "ut": "2021-01-21T02:38:33"
          },
          {
            "rid": 113,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/113/SGS-1754f37d.png",
            "l": "zh-CN",
            "ut": "2021-02-02T07:31:26"
          },
          {
            "rid": 113,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/113/SGS-1754f37d.png",
            "l": "en-US",
            "ut": "2021-02-02T07:31:26"
          },
          {
            "rid": 114,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/114/SGS-01607869.png",
            "l": "zh-CN",
            "ut": "2021-02-22T02:50:58"
          },
          {
            "rid": 114,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/114/SGS-01607869.png",
            "l": "en-US",
            "ut": "2021-02-22T02:50:58"
          },
          {
            "rid": 115,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/115/SGS-e31625c2.png",
            "l": "zh-CN",
            "ut": "2021-03-18T11:28:30"
          },
          {
            "rid": 115,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/115/SGS-e31625c2.png",
            "l": "en-US",
            "ut": "2021-03-18T11:28:30"
          },
          {
            "rid": 117,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/117/SGS-561c405f.png",
            "l": "zh-CN",
            "ut": "2021-04-19T02:01:43"
          },
          {
            "rid": 117,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/117/SGS-561c405f.png",
            "l": "en-US",
            "ut": "2021-04-19T02:01:43"
          },
          {
            "rid": 118,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/118/SGS-5cafd100.png",
            "l": "zh-CN",
            "ut": "2021-04-19T02:01:43"
          },
          {
            "rid": 118,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/118/SGS-5cafd100.png",
            "l": "en-US",
            "ut": "2021-04-19T02:01:43"
          },
          {
            "rid": 119,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/119/SGS-e7513a2b.png",
            "l": "zh-CN",
            "ut": "2021-05-24T03:43:13"
          },
          {
            "rid": 119,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/119/SGS-e7513a2b.png",
            "l": "en-US",
            "ut": "2021-05-24T03:43:13"
          },
          {
            "rid": 120,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/120/SGS-87e1ffad.png",
            "l": "zh-CN",
            "ut": "2021-06-21T04:33:50"
          },
          {
            "rid": 120,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/120/SGS-87e1ffad.png",
            "l": "en-US",
            "ut": "2021-06-21T04:33:50"
          },
          {
            "rid": 121,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/121/SGS-4cfbe2a6.png",
            "l": "zh-CN",
            "ut": "2021-06-21T04:33:51"
          },
          {
            "rid": 121,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/121/SGS-4cfbe2a6.png",
            "l": "en-US",
            "ut": "2021-06-21T04:33:51"
          },
          {
            "rid": 122,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/122/SGS-86e447da.png",
            "l": "zh-CN",
            "ut": "2021-06-21T04:33:51"
          },
          {
            "rid": 122,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/122/SGS-86e447da.png",
            "l": "en-US",
            "ut": "2021-06-21T04:33:51"
          },
          {
            "rid": 110,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/110/SGS-7acae095.png",
            "l": "zh-CN",
            "ut": "2021-06-24T07:49:50"
          },
          {
            "rid": 110,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/110/SGS-7acae095.png",
            "l": "en-US",
            "ut": "2021-06-24T07:49:50"
          },
          {
            "rid": 125,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/125/SGS-0d3e34ba.png",
            "l": "zh-CN",
            "ut": "2021-07-22T03:25:26"
          },
          {
            "rid": 125,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/125/SGS-0d3e34ba.png",
            "l": "en-US",
            "ut": "2021-07-22T03:25:26"
          },
          {
            "rid": 1,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/1/HoneyTrap_of_DiaoChan_168x168-b93b8e16.png",
            "l": "en-US",
            "ut": "2021-08-02T13:02:17"
          },
          {
            "rid": 126,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/126/SGS-5ebaee9a.png",
            "l": "zh-CN",
            "ut": "2021-08-24T10:16:12"
          },
          {
            "rid": 126,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/126/SGS-5ebaee9a.png",
            "l": "en-US",
            "ut": "2021-08-24T10:16:12"
          },
          {
            "rid": 130,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/lucky-piggy/SGS-c0b6b25e.png",
            "l": "zh-CN",
            "ut": "2021-12-30T08:08:56"
          },
          {
            "rid": 130,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/lucky-piggy/SGS-c0b6b25e.png",
            "l": "en-US",
            "ut": "2021-12-30T08:08:56"
          },
          {
            "rid": 128,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/legend-perseus/SGS-c2ebc3d7.png",
            "l": "zh-CN",
            "ut": "2022-01-03T02:40:52"
          },
          {
            "rid": 128,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/legend-perseus/SGS-c2ebc3d7.png",
            "l": "en-US",
            "ut": "2022-01-03T02:40:52"
          },
          {
            "rid": 124,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/124/SGS-070082d5.png",
            "l": "zh-CN",
            "ut": "2022-01-14T03:12:52"
          },
          {
            "rid": 124,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/124/SGS-070082d5.png",
            "l": "en-US",
            "ut": "2022-01-14T03:12:52"
          },
          {
            "rid": 123,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/123/SGS-170fb26d.png",
            "l": "zh-CN",
            "ut": "2022-03-02T04:42:37"
          },
          {
            "rid": 123,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/123/SGS-170fb26d.png",
            "l": "en-US",
            "ut": "2022-03-02T04:42:37"
          },
          {
            "rid": 129,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/win-win-fpc/SGS-a2c5e701.png",
            "l": "zh-CN",
            "ut": "2022-04-08T09:00:08"
          },
          {
            "rid": 129,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/win-win-fpc/SGS-a2c5e701.png",
            "l": "en-US",
            "ut": "2022-04-08T09:00:08"
          },
          {
            "rid": 127,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/speed-winner/SGS-e140cbef.png",
            "l": "zh-CN",
            "ut": "2022-05-30T03:11:11"
          },
          {
            "rid": 127,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/speed-winner/SGS-e140cbef.png",
            "l": "en-US",
            "ut": "2022-05-30T03:11:11"
          },
          {
            "rid": 132,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/wild-coaster/SGS-3939262e.png",
            "l": "zh-CN",
            "ut": "2022-06-10T10:25:31"
          },
          {
            "rid": 132,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/wild-coaster/SGS-3939262e.png",
            "l": "en-US",
            "ut": "2022-06-10T10:25:31"
          },
          {
            "rid": 135,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/wild-bounty-sd/SGS-1625475e.png",
            "l": "zh-CN",
            "ut": "2022-06-21T08:53:46"
          },
          {
            "rid": 135,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/wild-bounty-sd/SGS-1625475e.png",
            "l": "en-US",
            "ut": "2022-06-21T08:53:46"
          },
          {
            "rid": 1340277,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/asgardian-rs/SGS-37513a96.png",
            "l": "zh-CN",
            "ut": "2022-06-22T10:22:41"
          },
          {
            "rid": 1340277,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/asgardian-rs/SGS-37513a96.png",
            "l": "en-US",
            "ut": "2022-06-22T10:22:41"
          },
          {
            "rid": 1312883,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/prosper-ftree/SGS-1d26f078.png",
            "l": "zh-CN",
            "ut": "2022-07-07T08:42:12"
          },
          {
            "rid": 1312883,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/prosper-ftree/SGS-1d26f078.png",
            "l": "en-US",
            "ut": "2022-07-07T08:42:12"
          },
          {
            "rid": 1338274,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/totem-wonders/SGS-74887bbd.png",
            "l": "zh-CN",
            "ut": "2022-07-13T03:29:58"
          },
          {
            "rid": 1338274,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/totem-wonders/SGS-74887bbd.png",
            "l": "en-US",
            "ut": "2022-07-13T03:29:58"
          },
          {
            "rid": 1418544,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/bakery-bonanza/SGS-5e2d74ba.png",
            "l": "zh-CN",
            "ut": "2022-08-17T10:07:49"
          },
          {
            "rid": 1418544,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/bakery-bonanza/SGS-5e2d74ba.png",
            "l": "en-US",
            "ut": "2022-08-17T10:07:49"
          },
          {
            "rid": 1372643,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/diner-delights/SGS-42fb6173.png",
            "l": "zh-CN",
            "ut": "2022-08-18T02:32:05"
          },
          {
            "rid": 1372643,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/diner-delights/SGS-42fb6173.png",
            "l": "en-US",
            "ut": "2022-08-18T02:32:05"
          },
          {
            "rid": 1368367,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/alchemy-gold/SGS-4f200843.png",
            "l": "zh-CN",
            "ut": "2022-10-04T02:49:18"
          },
          {
            "rid": 1368367,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/alchemy-gold/SGS-4f200843.png",
            "l": "en-US",
            "ut": "2022-10-04T02:49:18"
          },
          {
            "rid": 1402846,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/midas-fortune/SGS-b0cbf979.png",
            "l": "zh-CN",
            "ut": "2022-12-16T04:18:32"
          },
          {
            "rid": 1402846,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/midas-fortune/SGS-b0cbf979.png",
            "l": "en-US",
            "ut": "2022-12-16T04:18:32"
          },
          {
            "rid": 1543462,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/fortune-rabbit/SGS-cb51bf17.png",
            "l": "zh-CN",
            "ut": "2023-01-06T08:51:52"
          },
          {
            "rid": 1543462,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/fortune-rabbit/SGS-cb51bf17.png",
            "l": "en-US",
            "ut": "2023-01-06T08:51:52"
          },
          {
            "rid": 1420892,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/rave-party-fvr/SGS-7fae58b2.png",
            "l": "zh-CN",
            "ut": "2023-02-10T06:31:55"
          },
          {
            "rid": 1420892,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/rave-party-fvr/SGS-7fae58b2.png",
            "l": "en-US",
            "ut": "2023-02-10T06:31:55"
          },
          {
            "rid": 1381200,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/hawaiian-tiki/SGS-3173d9dd.png",
            "l": "zh-CN",
            "ut": "2023-02-21T09:08:36"
          },
          {
            "rid": 1381200,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/hawaiian-tiki/SGS-3173d9dd.png",
            "l": "en-US",
            "ut": "2023-02-21T09:08:36"
          },
          {
            "rid": 1448762,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/songkran-spl/SGS-80716155.png",
            "l": "zh-CN",
            "ut": "2023-03-30T02:10:20"
          },
          {
            "rid": 1448762,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/songkran-spl/SGS-80716155.png",
            "l": "en-US",
            "ut": "2023-03-30T02:10:20"
          },
          {
            "rid": 1432733,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/myst-spirits/SGS-16c3227e.png",
            "l": "zh-CN",
            "ut": "2023-04-17T10:24:16"
          },
          {
            "rid": 1432733,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/myst-spirits/SGS-16c3227e.png",
            "l": "en-US",
            "ut": "2023-04-17T10:24:16"
          },
          {
            "rid": 1513328,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/spr-golf-drive/SGS-506e64f1.png",
            "l": "zh-CN",
            "ut": "2023-05-15T08:27:29"
          },
          {
            "rid": 1513328,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/spr-golf-drive/SGS-506e64f1.png",
            "l": "en-US",
            "ut": "2023-05-15T08:27:29"
          },
          {
            "rid": 1601012,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/lucky-clover/SGS-dc7a6b49.png",
            "l": "zh-CN",
            "ut": "2023-06-06T08:46:35"
          },
          {
            "rid": 1601012,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/lucky-clover/SGS-dc7a6b49.png",
            "l": "en-US",
            "ut": "2023-06-06T08:46:35"
          },
          {
            "rid": 1397455,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/fruity-candy/SGS-52bc4515.png",
            "l": "zh-CN",
            "ut": "2023-07-04T10:31:01"
          },
          {
            "rid": 1397455,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/fruity-candy/SGS-52bc4515.png",
            "l": "en-US",
            "ut": "2023-07-04T10:31:01"
          },
          {
            "rid": 1473388,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/cruise-royale/SGS-5d34cf10.png",
            "l": "zh-CN",
            "ut": "2023-08-04T06:31:58"
          },
          {
            "rid": 1473388,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/cruise-royale/SGS-5d34cf10.png",
            "l": "en-US",
            "ut": "2023-08-04T06:31:58"
          },
          {
            "rid": 1594259,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/safari-wilds/SGS-2649f83a.png",
            "l": "zh-CN",
            "ut": "2023-08-24T02:59:31"
          },
          {
            "rid": 1594259,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/safari-wilds/SGS-2649f83a.png",
            "l": "en-US",
            "ut": "2023-08-24T02:59:31"
          },
          {
            "rid": 1572362,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/gladi-glory/SGS-561ca938.png",
            "l": "zh-CN",
            "ut": "2023-09-13T11:52:45"
          },
          {
            "rid": 1572362,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/gladi-glory/SGS-561ca938.png",
            "l": "en-US",
            "ut": "2023-09-13T11:52:45"
          },
          {
            "rid": 1529867,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/ninja-raccoon/SGS-81d12e83.png",
            "l": "zh-CN",
            "ut": "2023-10-11T03:40:52"
          },
          {
            "rid": 1529867,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/ninja-raccoon/SGS-81d12e83.png",
            "l": "en-US",
            "ut": "2023-10-11T03:40:52"
          },
          {
            "rid": 1489936,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/ult-striker/SGS-44177ef3.png",
            "l": "zh-CN",
            "ut": "2023-10-11T03:40:52"
          },
          {
            "rid": 1489936,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/ult-striker/SGS-44177ef3.png",
            "l": "en-US",
            "ut": "2023-10-11T03:40:52"
          },
          {
            "rid": 1568554,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/wild-heist-co/SGS-c6cd2748.png",
            "l": "zh-CN",
            "ut": "2023-10-25T04:36:49"
          },
          {
            "rid": 1568554,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/wild-heist-co/SGS-c6cd2748.png",
            "l": "en-US",
            "ut": "2023-10-25T04:36:49"
          },
          {
            "rid": 1555350,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/forge-wealth/SGS-b6c28d1e.png",
            "l": "zh-CN",
            "ut": "2023-11-08T06:15:09"
          },
          {
            "rid": 1555350,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/forge-wealth/SGS-b6c28d1e.png",
            "l": "en-US",
            "ut": "2023-11-08T06:15:09"
          },
          {
            "rid": 1580541,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/mafia-mayhem/SGS-1cdf4e86.png",
            "l": "zh-CN",
            "ut": "2023-11-30T08:42:38"
          },
          {
            "rid": 1580541,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/mafia-mayhem/SGS-1cdf4e86.png",
            "l": "en-US",
            "ut": "2023-11-30T08:42:38"
          },
          {
            "rid": 1655268,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/tsar-treasures/SGS-cbae2d00.png",
            "l": "zh-CN",
            "ut": "2023-12-08T05:13:17"
          },
          {
            "rid": 1655268,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/tsar-treasures/SGS-cbae2d00.png",
            "l": "en-US",
            "ut": "2023-12-08T05:13:17"
          },
          {
            "rid": 1615454,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/werewolf-hunt/SGS-3ffae844.png",
            "l": "zh-CN",
            "ut": "2023-12-19T02:55:01"
          },
          {
            "rid": 1615454,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/werewolf-hunt/SGS-3ffae844.png",
            "l": "en-US",
            "ut": "2023-12-19T02:55:01"
          },
          {
            "rid": 1451122,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/dragon-hatch2/SGS-8787a1fa.png",
            "l": "zh-CN",
            "ut": "2024-01-03T03:34:13"
          },
          {
            "rid": 1451122,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/dragon-hatch2/SGS-8787a1fa.png",
            "l": "en-US",
            "ut": "2024-01-03T03:34:13"
          },
          {
            "rid": 1695365,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/fortune-dragon/SGS-85d8c240.png",
            "l": "zh-CN",
            "ut": "2024-01-17T09:25:49"
          },
          {
            "rid": 1695365,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/fortune-dragon/SGS-85d8c240.png",
            "l": "en-US",
            "ut": "2024-01-17T09:25:49"
          },
          {
            "rid": 1671262,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/gemstones-gold/SGS-5443abf7.png",
            "l": "zh-CN",
            "ut": "2024-02-22T09:45:28"
          },
          {
            "rid": 1671262,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/gemstones-gold/SGS-5443abf7.png",
            "l": "en-US",
            "ut": "2024-02-22T09:45:28"
          },
          {
            "rid": 1682240,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/cash-mania/SGS-ab3ac88a.png",
            "l": "zh-CN",
            "ut": "2024-03-04T08:17:29"
          },
          {
            "rid": 1682240,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/cash-mania/SGS-ab3ac88a.png",
            "l": "en-US",
            "ut": "2024-03-04T08:17:29"
          },
          {
            "rid": 1508783,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/wild-ape-3258/SGS-b6ed6baa.png",
            "l": "zh-CN",
            "ut": "2024-03-21T04:05:18"
          },
          {
            "rid": 1508783,
            "rtid": 14,
            "url": "https://public.pgsoft-games.com/pages/static/image/en/SocialGameSmall/wild-ape-3258/SGS-b6ed6baa.png",
            "l": "en-US",
            "ut": "2024-03-21T04:05:18"
          }
        ],
        "err": null
      }';

      $resurceData = json_decode($json_str);

      
      return response()->json($resurceData);
    }

    // 投注结果
    public function getSpinInfo(Request $request) {

      $this->test();
      // 随机投注结果
      $random_bet_info = $this->getRandomBetInfo(36, 2, 12);

      // 连线数据
      $continuous_regions = $this->findCommonNumbers($random_bet_info);

      // 赔率+连线
      $rate_cr = "null";

      $json_str = '{
        "dt": {
          "si": {
            "wp": null,
            "lw": null,
            "orl": '.json_encode($random_bet_info).',
            "bwp": '.$rate_cr.',
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
            "ptbr": '.$continuous_regions.',
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
            "rl": '.json_encode($random_bet_info).',
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

    // 取得投注纪录 
    public function getBetHistory(Request $request) {

      $json_str = '{
        "dt": {
          "bh": [
            {
              "tid": "1772861977355288064",
              "gid": 62,
              "cc": "PGC",
              "gtba": 12,
              "gtwla": 15.6,
              "bt": 1711518208241,
              "ge": [
                1,
                11
              ],
              "bd": [
                {
                  "tid": "1772861977355288064",
                  "tba": 12,
                  "twla": 6,
                  "bl": 99958,
                  "bt": 1711518208241,
                  "gd": {
                    "wp": {
                      "7": [
                        2,
                        3,
                        4,
                        10,
                        11,
                        14,
                        15,
                        16
                      ]
                    },
                    "lw": {
                      "7": 18
                    },
                    "orl": [
                      5,
                      5,
                      7,
                      7,
                      7,
                      9,
                      8,
                      8,
                      4,
                      4,
                      7,
                      7,
                      6,
                      8,
                      7,
                      7,
                      7,
                      10,
                      8,
                      5,
                      5,
                      11,
                      11,
                      11,
                      8,
                      8,
                      8,
                      10,
                      10,
                      12,
                      5,
                      5,
                      7,
                      7,
                      7,
                      12
                    ],
                    "bwp": {
                      "7": [
                        [
                          2
                        ],
                        [
                          3
                        ],
                        [
                          4
                        ],
                        [
                          10
                        ],
                        [
                          11
                        ],
                        [
                          14,
                          15,
                          16
                        ]
                      ]
                    },
                    "now": 9216,
                    "nowpr": [
                      6,
                      4,
                      4,
                      4,
                      4,
                      6
                    ],
                    "snww": {
                      "7": 6
                    },
                    "esb": {
                      "1": [
                        6,
                        7
                      ],
                      "2": [
                        8,
                        9
                      ],
                      "3": [
                        14,
                        15,
                        16
                      ],
                      "4": [
                        21,
                        22,
                        23
                      ],
                      "5": [
                        25,
                        26
                      ],
                      "6": [
                        27,
                        28
                      ]
                    },
                    "ebb": {
                      "1": {
                        "fp": 6,
                        "lp": 7,
                        "bt": 1,
                        "ls": 2
                      },
                      "2": {
                        "fp": 8,
                        "lp": 9,
                        "bt": 2,
                        "ls": 1
                      },
                      "3": {
                        "fp": 14,
                        "lp": 16,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 21,
                        "lp": 23,
                        "bt": 2,
                        "ls": 1
                      },
                      "5": {
                        "fp": 25,
                        "lp": 26,
                        "bt": 1,
                        "ls": 2
                      },
                      "6": {
                        "fp": 27,
                        "lp": 28,
                        "bt": 1,
                        "ls": 2
                      }
                    },
                    "es": {
                      "1": [
                        6,
                        7
                      ],
                      "2": [
                        8,
                        9
                      ],
                      "4": [
                        21,
                        22,
                        23
                      ],
                      "5": [
                        25,
                        26
                      ],
                      "6": [
                        27,
                        28
                      ]
                    },
                    "eb": {
                      "1": {
                        "fp": 6,
                        "lp": 7,
                        "bt": 1,
                        "ls": 2
                      },
                      "2": {
                        "fp": 8,
                        "lp": 9,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 21,
                        "lp": 23,
                        "bt": 2,
                        "ls": 1
                      },
                      "5": {
                        "fp": 25,
                        "lp": 26,
                        "bt": 1,
                        "ls": 2
                      },
                      "6": {
                        "fp": 27,
                        "lp": 28,
                        "bt": 1,
                        "ls": 2
                      }
                    },
                    "rs": null,
                    "fs": null,
                    "ssaw": 18,
                    "ptbr": [
                      2,
                      3,
                      4,
                      10,
                      11,
                      14,
                      15,
                      16
                    ],
                    "sc": 0,
                    "gwt": -1,
                    "fb": null,
                    "ctw": 18,
                    "pmt": null,
                    "cwc": 1,
                    "fstc": null,
                    "pcwc": 1,
                    "rwsp": {
                      "7": 5
                    },
                    "hashr": "0:5;8;6;8;8;5#5;8;8;5;8;5#7;4;7;5;8;7#7;4;7;11;10;7#7;7;7;11;10;7#9;7;10;11;12;12#R#7#0203041415222324#MV#12.0#MT#1#MG#18.0#",
                    "ml": 2,
                    "cs": 0.3,
                    "rl": [
                      5,
                      5,
                      7,
                      7,
                      7,
                      9,
                      8,
                      8,
                      4,
                      4,
                      7,
                      7,
                      6,
                      8,
                      7,
                      7,
                      7,
                      10,
                      8,
                      5,
                      5,
                      11,
                      11,
                      11,
                      8,
                      8,
                      8,
                      10,
                      10,
                      12,
                      5,
                      5,
                      7,
                      7,
                      7,
                      12
                    ],
                    "sid": "1772861977355288064",
                    "psid": "1772861977355288064",
                    "st": 1,
                    "nst": 4,
                    "pf": 1,
                    "aw": 18,
                    "wid": 0,
                    "wt": "C",
                    "wk": "0_C",
                    "wbn": null,
                    "wfg": null,
                    "blb": 99952,
                    "blab": 99940,
                    "bl": 99958,
                    "tb": 12,
                    "tbb": 12,
                    "tw": 18,
                    "np": 6,
                    "ocr": null,
                    "mr": null,
                    "ge": [
                      1,
                      11
                    ]
                  }
                },
                {
                  "tid": "1772861991297154560",
                  "tba": 0,
                  "twla": 9.6,
                  "bl": 99967.6,
                  "bt": 1711518211565,
                  "gd": {
                    "wp": {
                      "8": [
                        2,
                        8,
                        9,
                        16,
                        18,
                        24,
                        25,
                        26
                      ]
                    },
                    "lw": {
                      "8": 9.6
                    },
                    "orl": [
                      12,
                      12,
                      8,
                      5,
                      5,
                      9,
                      9,
                      6,
                      8,
                      8,
                      4,
                      4,
                      10,
                      3,
                      1,
                      6,
                      8,
                      10,
                      8,
                      5,
                      5,
                      11,
                      11,
                      11,
                      8,
                      8,
                      8,
                      10,
                      10,
                      12,
                      5,
                      5,
                      7,
                      7,
                      7,
                      12
                    ],
                    "bwp": {
                      "8": [
                        [
                          2
                        ],
                        [
                          8,
                          9
                        ],
                        [
                          16
                        ],
                        [
                          18
                        ],
                        [
                          24
                        ],
                        [
                          25,
                          26
                        ]
                      ]
                    },
                    "now": 13824,
                    "nowpr": [
                      6,
                      4,
                      6,
                      4,
                      4,
                      6
                    ],
                    "snww": {
                      "8": 2
                    },
                    "esb": {
                      "1": [
                        8,
                        9
                      ],
                      "2": [
                        10,
                        11
                      ],
                      "4": [
                        21,
                        22,
                        23
                      ],
                      "5": [
                        25,
                        26
                      ],
                      "6": [
                        27,
                        28
                      ]
                    },
                    "ebb": {
                      "1": {
                        "fp": 8,
                        "lp": 9,
                        "bt": 1,
                        "ls": 2
                      },
                      "2": {
                        "fp": 10,
                        "lp": 11,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 21,
                        "lp": 23,
                        "bt": 2,
                        "ls": 1
                      },
                      "5": {
                        "fp": 25,
                        "lp": 26,
                        "bt": 1,
                        "ls": 2
                      },
                      "6": {
                        "fp": 27,
                        "lp": 28,
                        "bt": 1,
                        "ls": 2
                      }
                    },
                    "es": {
                      "1": [
                        8,
                        9
                      ],
                      "2": [
                        10,
                        11
                      ],
                      "4": [
                        21,
                        22,
                        23
                      ],
                      "5": [
                        25,
                        26
                      ],
                      "6": [
                        27,
                        28
                      ]
                    },
                    "eb": {
                      "1": {
                        "fp": 8,
                        "lp": 9,
                        "bt": 1,
                        "ls": 1
                      },
                      "2": {
                        "fp": 10,
                        "lp": 11,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 21,
                        "lp": 23,
                        "bt": 2,
                        "ls": 1
                      },
                      "5": {
                        "fp": 25,
                        "lp": 26,
                        "bt": 1,
                        "ls": 1
                      },
                      "6": {
                        "fp": 27,
                        "lp": 28,
                        "bt": 1,
                        "ls": 2
                      }
                    },
                    "rs": {
                      "esst": {},
                      "espt": {
                        "1": {
                          "op": [
                            6,
                            7
                          ],
                          "np": [
                            8,
                            9
                          ]
                        },
                        "2": {
                          "op": [
                            8,
                            9
                          ],
                          "np": [
                            10,
                            11
                          ]
                        }
                      },
                      "rns": [
                        [
                          12,
                          12,
                          8
                        ],
                        [
                          9,
                          6
                        ],
                        [
                          10,
                          3,
                          1
                        ],
                        [],
                        [],
                        []
                      ],
                      "bweb": {}
                    },
                    "fs": null,
                    "ssaw": 27.6,
                    "ptbr": [
                      2,
                      16,
                      18,
                      24
                    ],
                    "sc": 1,
                    "gwt": -1,
                    "fb": null,
                    "ctw": 9.6,
                    "pmt": null,
                    "cwc": 2,
                    "fstc": {
                      "4": 1
                    },
                    "pcwc": 0,
                    "rwsp": {
                      "8": 8
                    },
                    "hashr": "1:12;9;10;8;8;5#12;6;3;5;8;5#8;8;1;5;8;7#5;8;6;11;10;7#5;4;8;11;10;7#9;4;10;11;12;12#R#8#0212132430404142#MV#0#MT#1#MG#9.6#",
                    "ml": 2,
                    "cs": 0.3,
                    "rl": [
                      12,
                      12,
                      8,
                      5,
                      5,
                      9,
                      9,
                      6,
                      8,
                      8,
                      4,
                      4,
                      10,
                      3,
                      1,
                      6,
                      8,
                      10,
                      8,
                      5,
                      5,
                      11,
                      11,
                      11,
                      8,
                      8,
                      8,
                      10,
                      10,
                      12,
                      5,
                      5,
                      7,
                      7,
                      7,
                      12
                    ],
                    "sid": "1772861991297154560",
                    "psid": "1772861977355288064",
                    "st": 4,
                    "nst": 4,
                    "pf": 1,
                    "aw": 27.6,
                    "wid": 0,
                    "wt": "C",
                    "wk": "0_C",
                    "wbn": null,
                    "wfg": null,
                    "blb": 99958,
                    "blab": 99958,
                    "bl": 99967.6,
                    "tb": 0,
                    "tbb": 12,
                    "tw": 9.6,
                    "np": 9.6,
                    "ocr": null,
                    "mr": null,
                    "ge": [
                      1,
                      11
                    ]
                  }
                },
                {
                  "tid": "1772862005239021056",
                  "tba": 0,
                  "twla": 0,
                  "bl": 99967.6,
                  "bt": 1711518214889,
                  "gd": {
                    "wp": null,
                    "lw": null,
                    "orl": [
                      1,
                      12,
                      12,
                      5,
                      5,
                      9,
                      9,
                      6,
                      7,
                      7,
                      4,
                      4,
                      1,
                      10,
                      3,
                      1,
                      6,
                      10,
                      7,
                      5,
                      5,
                      11,
                      11,
                      11,
                      4,
                      11,
                      11,
                      10,
                      10,
                      12,
                      5,
                      5,
                      7,
                      7,
                      7,
                      12
                    ],
                    "bwp": null,
                    "now": 13824,
                    "nowpr": [
                      6,
                      4,
                      6,
                      4,
                      4,
                      6
                    ],
                    "snww": null,
                    "esb": {
                      "1": [
                        8,
                        9
                      ],
                      "2": [
                        10,
                        11
                      ],
                      "4": [
                        21,
                        22,
                        23
                      ],
                      "5": [
                        25,
                        26
                      ],
                      "6": [
                        27,
                        28
                      ]
                    },
                    "ebb": {
                      "1": {
                        "fp": 8,
                        "lp": 9,
                        "bt": 1,
                        "ls": 1
                      },
                      "2": {
                        "fp": 10,
                        "lp": 11,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 21,
                        "lp": 23,
                        "bt": 2,
                        "ls": 1
                      },
                      "5": {
                        "fp": 25,
                        "lp": 26,
                        "bt": 1,
                        "ls": 1
                      },
                      "6": {
                        "fp": 27,
                        "lp": 28,
                        "bt": 1,
                        "ls": 2
                      }
                    },
                    "es": {
                      "1": [
                        8,
                        9
                      ],
                      "2": [
                        10,
                        11
                      ],
                      "4": [
                        21,
                        22,
                        23
                      ],
                      "5": [
                        25,
                        26
                      ],
                      "6": [
                        27,
                        28
                      ]
                    },
                    "eb": {
                      "1": {
                        "fp": 8,
                        "lp": 9,
                        "bt": 1,
                        "ls": 1
                      },
                      "2": {
                        "fp": 10,
                        "lp": 11,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 21,
                        "lp": 23,
                        "bt": 2,
                        "ls": 1
                      },
                      "5": {
                        "fp": 25,
                        "lp": 26,
                        "bt": 1,
                        "ls": 1
                      },
                      "6": {
                        "fp": 27,
                        "lp": 28,
                        "bt": 1,
                        "ls": 2
                      }
                    },
                    "rs": {
                      "esst": {
                        "1": {
                          "os": 8,
                          "ns": 7
                        },
                        "5": {
                          "os": 8,
                          "ns": 11
                        }
                      },
                      "espt": {},
                      "rns": [
                        [
                          1
                        ],
                        [],
                        [
                          1
                        ],
                        [
                          7
                        ],
                        [
                          4
                        ],
                        []
                      ],
                      "bweb": {}
                    },
                    "fs": null,
                    "ssaw": 27.6,
                    "ptbr": null,
                    "sc": 3,
                    "gwt": -1,
                    "fb": null,
                    "ctw": 0,
                    "pmt": null,
                    "cwc": 0,
                    "fstc": {
                      "4": 2
                    },
                    "pcwc": 0,
                    "rwsp": null,
                    "hashr": "2:1;9;1;7;4;5#12;6;10;5;11;5#12;7;3;5;11;7#5;7;1;11;10;7#5;4;6;11;10;7#9;4;10;11;12;12#MV#0#MT#1#MG#0#",
                    "ml": 2,
                    "cs": 0.3,
                    "rl": [
                      1,
                      12,
                      12,
                      5,
                      5,
                      9,
                      9,
                      6,
                      7,
                      7,
                      4,
                      4,
                      1,
                      10,
                      3,
                      1,
                      6,
                      10,
                      7,
                      5,
                      5,
                      11,
                      11,
                      11,
                      4,
                      11,
                      11,
                      10,
                      10,
                      12,
                      5,
                      5,
                      7,
                      7,
                      7,
                      12
                    ],
                    "sid": "1772862005239021056",
                    "psid": "1772861977355288064",
                    "st": 4,
                    "nst": 1,
                    "pf": 1,
                    "aw": 27.6,
                    "wid": 0,
                    "wt": "C",
                    "wk": "0_C",
                    "wbn": null,
                    "wfg": null,
                    "blb": 99967.6,
                    "blab": 99967.6,
                    "bl": 99967.6,
                    "tb": 0,
                    "tbb": 12,
                    "tw": 0,
                    "np": 0,
                    "ocr": null,
                    "mr": null,
                    "ge": [
                      1,
                      11
                    ]
                  }
                }
              ],
              "mgcc": 0,
              "fscc": 0
            },
            {
              "tid": "1772861785491045888",
              "gid": 62,
              "cc": "PGC",
              "gtba": 12,
              "gtwla": -12,
              "bt": 1711518162497,
              "ge": [
                1,
                11
              ],
              "bd": [
                {
                  "tid": "1772861785491045888",
                  "tba": 12,
                  "twla": -12,
                  "bl": 99952,
                  "bt": 1711518162497,
                  "gd": {
                    "wp": null,
                    "lw": null,
                    "orl": [
                      9,
                      2,
                      3,
                      9,
                      1,
                      9,
                      8,
                      10,
                      11,
                      11,
                      8,
                      8,
                      10,
                      10,
                      12,
                      12,
                      12,
                      3,
                      3,
                      3,
                      3,
                      9,
                      9,
                      6,
                      4,
                      12,
                      12,
                      9,
                      7,
                      9,
                      5,
                      5,
                      7,
                      7,
                      7,
                      8
                    ],
                    "bwp": null,
                    "now": 6480,
                    "nowpr": [
                      6,
                      4,
                      3,
                      3,
                      5,
                      6
                    ],
                    "snww": null,
                    "esb": {
                      "1": [
                        8,
                        9
                      ],
                      "2": [
                        10,
                        11
                      ],
                      "3": [
                        12,
                        13
                      ],
                      "4": [
                        14,
                        15,
                        16
                      ],
                      "5": [
                        18,
                        19,
                        20
                      ],
                      "6": [
                        21,
                        22
                      ],
                      "7": [
                        25,
                        26
                      ]
                    },
                    "ebb": {
                      "1": {
                        "fp": 8,
                        "lp": 9,
                        "bt": 2,
                        "ls": 1
                      },
                      "2": {
                        "fp": 10,
                        "lp": 11,
                        "bt": 2,
                        "ls": 1
                      },
                      "3": {
                        "fp": 12,
                        "lp": 13,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 14,
                        "lp": 16,
                        "bt": 2,
                        "ls": 1
                      },
                      "5": {
                        "fp": 18,
                        "lp": 20,
                        "bt": 2,
                        "ls": 1
                      },
                      "6": {
                        "fp": 21,
                        "lp": 22,
                        "bt": 1,
                        "ls": 2
                      },
                      "7": {
                        "fp": 25,
                        "lp": 26,
                        "bt": 1,
                        "ls": 2
                      }
                    },
                    "es": {
                      "1": [
                        8,
                        9
                      ],
                      "2": [
                        10,
                        11
                      ],
                      "3": [
                        12,
                        13
                      ],
                      "4": [
                        14,
                        15,
                        16
                      ],
                      "5": [
                        18,
                        19,
                        20
                      ],
                      "6": [
                        21,
                        22
                      ],
                      "7": [
                        25,
                        26
                      ]
                    },
                    "eb": {
                      "1": {
                        "fp": 8,
                        "lp": 9,
                        "bt": 2,
                        "ls": 1
                      },
                      "2": {
                        "fp": 10,
                        "lp": 11,
                        "bt": 2,
                        "ls": 1
                      },
                      "3": {
                        "fp": 12,
                        "lp": 13,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 14,
                        "lp": 16,
                        "bt": 2,
                        "ls": 1
                      },
                      "5": {
                        "fp": 18,
                        "lp": 20,
                        "bt": 2,
                        "ls": 1
                      },
                      "6": {
                        "fp": 21,
                        "lp": 22,
                        "bt": 1,
                        "ls": 2
                      },
                      "7": {
                        "fp": 25,
                        "lp": 26,
                        "bt": 1,
                        "ls": 2
                      }
                    },
                    "rs": null,
                    "fs": null,
                    "ssaw": 0,
                    "ptbr": null,
                    "sc": 1,
                    "gwt": -1,
                    "fb": null,
                    "ctw": 0,
                    "pmt": null,
                    "cwc": 0,
                    "fstc": null,
                    "pcwc": 0,
                    "rwsp": null,
                    "hashr": "0:9;8;10;3;4;5#2;10;10;3;12;5#3;11;12;3;12;7#9;11;12;9;9;7#1;8;12;9;7;7#9;8;3;6;9;8#MV#12.0#MT#1#MG#0#",
                    "ml": 2,
                    "cs": 0.3,
                    "rl": [
                      9,
                      2,
                      3,
                      9,
                      1,
                      9,
                      8,
                      10,
                      11,
                      11,
                      8,
                      8,
                      10,
                      10,
                      12,
                      12,
                      12,
                      3,
                      3,
                      3,
                      3,
                      9,
                      9,
                      6,
                      4,
                      12,
                      12,
                      9,
                      7,
                      9,
                      5,
                      5,
                      7,
                      7,
                      7,
                      8
                    ],
                    "sid": "1772861785491045888",
                    "psid": "1772861785491045888",
                    "st": 1,
                    "nst": 1,
                    "pf": 1,
                    "aw": 0,
                    "wid": 0,
                    "wt": "C",
                    "wk": "0_C",
                    "wbn": null,
                    "wfg": null,
                    "blb": 99964,
                    "blab": 99952,
                    "bl": 99952,
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
                }
              ],
              "mgcc": 0,
              "fscc": 0
            },
            {
              "tid": "1772861747910082048",
              "gid": 62,
              "cc": "PGC",
              "gtba": 12,
              "gtwla": -12,
              "bt": 1711518153537,
              "ge": [
                1,
                11
              ],
              "bd": [
                {
                  "tid": "1772861747910082048",
                  "tba": 12,
                  "twla": -12,
                  "bl": 99964,
                  "bt": 1711518153537,
                  "gd": {
                    "wp": null,
                    "lw": null,
                    "orl": [
                      5,
                      9,
                      11,
                      12,
                      11,
                      2,
                      10,
                      10,
                      11,
                      11,
                      6,
                      6,
                      9,
                      9,
                      10,
                      10,
                      10,
                      10,
                      10,
                      10,
                      10,
                      10,
                      10,
                      8,
                      3,
                      7,
                      7,
                      7,
                      7,
                      9,
                      6,
                      8,
                      10,
                      12,
                      11,
                      8
                    ],
                    "bwp": null,
                    "now": 5184,
                    "nowpr": [
                      6,
                      4,
                      3,
                      3,
                      4,
                      6
                    ],
                    "snww": null,
                    "esb": {
                      "1": [
                        6,
                        7
                      ],
                      "2": [
                        8,
                        9
                      ],
                      "3": [
                        12,
                        13
                      ],
                      "4": [
                        14,
                        15,
                        16
                      ],
                      "5": [
                        18,
                        19,
                        20
                      ],
                      "6": [
                        21,
                        22
                      ],
                      "7": [
                        25,
                        26,
                        27
                      ]
                    },
                    "ebb": {
                      "1": {
                        "fp": 6,
                        "lp": 7,
                        "bt": 1,
                        "ls": 2
                      },
                      "2": {
                        "fp": 8,
                        "lp": 9,
                        "bt": 2,
                        "ls": 1
                      },
                      "3": {
                        "fp": 12,
                        "lp": 13,
                        "bt": 1,
                        "ls": 2
                      },
                      "4": {
                        "fp": 14,
                        "lp": 16,
                        "bt": 1,
                        "ls": 2
                      },
                      "5": {
                        "fp": 18,
                        "lp": 20,
                        "bt": 1,
                        "ls": 2
                      },
                      "6": {
                        "fp": 21,
                        "lp": 22,
                        "bt": 1,
                        "ls": 2
                      },
                      "7": {
                        "fp": 25,
                        "lp": 27,
                        "bt": 1,
                        "ls": 2
                      }
                    },
                    "es": {
                      "1": [
                        6,
                        7
                      ],
                      "2": [
                        8,
                        9
                      ],
                      "3": [
                        12,
                        13
                      ],
                      "4": [
                        14,
                        15,
                        16
                      ],
                      "5": [
                        18,
                        19,
                        20
                      ],
                      "6": [
                        21,
                        22
                      ],
                      "7": [
                        25,
                        26,
                        27
                      ]
                    },
                    "eb": {
                      "1": {
                        "fp": 6,
                        "lp": 7,
                        "bt": 1,
                        "ls": 2
                      },
                      "2": {
                        "fp": 8,
                        "lp": 9,
                        "bt": 2,
                        "ls": 1
                      },
                      "3": {
                        "fp": 12,
                        "lp": 13,
                        "bt": 1,
                        "ls": 2
                      },
                      "4": {
                        "fp": 14,
                        "lp": 16,
                        "bt": 1,
                        "ls": 2
                      },
                      "5": {
                        "fp": 18,
                        "lp": 20,
                        "bt": 1,
                        "ls": 2
                      },
                      "6": {
                        "fp": 21,
                        "lp": 22,
                        "bt": 1,
                        "ls": 2
                      },
                      "7": {
                        "fp": 25,
                        "lp": 27,
                        "bt": 1,
                        "ls": 2
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
                    "hashr": "0:5;10;9;10;3;6#9;10;9;10;7;8#11;11;10;10;7;10#12;11;10;10;7;12#11;6;10;10;7;11#2;6;10;8;9;8#MV#12.0#MT#1#MG#0#",
                    "ml": 2,
                    "cs": 0.3,
                    "rl": [
                      5,
                      9,
                      11,
                      12,
                      11,
                      2,
                      10,
                      10,
                      11,
                      11,
                      6,
                      6,
                      9,
                      9,
                      10,
                      10,
                      10,
                      10,
                      10,
                      10,
                      10,
                      10,
                      10,
                      8,
                      3,
                      7,
                      7,
                      7,
                      7,
                      9,
                      6,
                      8,
                      10,
                      12,
                      11,
                      8
                    ],
                    "sid": "1772861747910082048",
                    "psid": "1772861747910082048",
                    "st": 1,
                    "nst": 1,
                    "pf": 1,
                    "aw": 0,
                    "wid": 0,
                    "wt": "C",
                    "wk": "0_C",
                    "wbn": null,
                    "wfg": null,
                    "blb": 99976,
                    "blab": 99964,
                    "bl": 99964,
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
                }
              ],
              "mgcc": 0,
              "fscc": 0
            },
            {
              "tid": "1772861668503518720",
              "gid": 62,
              "cc": "PGC",
              "gtba": 12,
              "gtwla": -12,
              "bt": 1711518134605,
              "ge": [
                1,
                11
              ],
              "bd": [
                {
                  "tid": "1772861668503518720",
                  "tba": 12,
                  "twla": -12,
                  "bl": 99976,
                  "bt": 1711518134605,
                  "gd": {
                    "wp": null,
                    "lw": null,
                    "orl": [
                      6,
                      6,
                      6,
                      8,
                      5,
                      6,
                      9,
                      9,
                      12,
                      6,
                      10,
                      10,
                      8,
                      8,
                      7,
                      7,
                      10,
                      10,
                      7,
                      7,
                      8,
                      8,
                      5,
                      5,
                      5,
                      5,
                      5,
                      10,
                      10,
                      10,
                      4,
                      4,
                      4,
                      6,
                      10,
                      8
                    ],
                    "bwp": null,
                    "now": 8640,
                    "nowpr": [
                      6,
                      4,
                      3,
                      5,
                      4,
                      6
                    ],
                    "snww": null,
                    "esb": {
                      "1": [
                        6,
                        7
                      ],
                      "2": [
                        10,
                        11
                      ],
                      "3": [
                        12,
                        13
                      ],
                      "4": [
                        14,
                        15
                      ],
                      "5": [
                        16,
                        17
                      ],
                      "6": [
                        20,
                        21
                      ],
                      "7": [
                        24,
                        25,
                        26
                      ]
                    },
                    "ebb": {
                      "1": {
                        "fp": 6,
                        "lp": 7,
                        "bt": 1,
                        "ls": 2
                      },
                      "2": {
                        "fp": 10,
                        "lp": 11,
                        "bt": 2,
                        "ls": 1
                      },
                      "3": {
                        "fp": 12,
                        "lp": 13,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 14,
                        "lp": 15,
                        "bt": 2,
                        "ls": 1
                      },
                      "5": {
                        "fp": 16,
                        "lp": 17,
                        "bt": 2,
                        "ls": 1
                      },
                      "6": {
                        "fp": 20,
                        "lp": 21,
                        "bt": 2,
                        "ls": 1
                      },
                      "7": {
                        "fp": 24,
                        "lp": 26,
                        "bt": 1,
                        "ls": 2
                      }
                    },
                    "es": {
                      "1": [
                        6,
                        7
                      ],
                      "2": [
                        10,
                        11
                      ],
                      "3": [
                        12,
                        13
                      ],
                      "4": [
                        14,
                        15
                      ],
                      "5": [
                        16,
                        17
                      ],
                      "6": [
                        20,
                        21
                      ],
                      "7": [
                        24,
                        25,
                        26
                      ]
                    },
                    "eb": {
                      "1": {
                        "fp": 6,
                        "lp": 7,
                        "bt": 1,
                        "ls": 2
                      },
                      "2": {
                        "fp": 10,
                        "lp": 11,
                        "bt": 2,
                        "ls": 1
                      },
                      "3": {
                        "fp": 12,
                        "lp": 13,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 14,
                        "lp": 15,
                        "bt": 2,
                        "ls": 1
                      },
                      "5": {
                        "fp": 16,
                        "lp": 17,
                        "bt": 2,
                        "ls": 1
                      },
                      "6": {
                        "fp": 20,
                        "lp": 21,
                        "bt": 2,
                        "ls": 1
                      },
                      "7": {
                        "fp": 24,
                        "lp": 26,
                        "bt": 1,
                        "ls": 2
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
                    "hashr": "0:6;9;8;7;5;4#6;9;8;7;5;4#6;12;7;8;5;4#8;6;7;8;10;6#5;10;10;5;10;10#6;10;10;5;10;8#MV#12.0#MT#1#MG#0#",
                    "ml": 2,
                    "cs": 0.3,
                    "rl": [
                      6,
                      6,
                      6,
                      8,
                      5,
                      6,
                      9,
                      9,
                      12,
                      6,
                      10,
                      10,
                      8,
                      8,
                      7,
                      7,
                      10,
                      10,
                      7,
                      7,
                      8,
                      8,
                      5,
                      5,
                      5,
                      5,
                      5,
                      10,
                      10,
                      10,
                      4,
                      4,
                      4,
                      6,
                      10,
                      8
                    ],
                    "sid": "1772861668503518720",
                    "psid": "1772861668503518720",
                    "st": 1,
                    "nst": 1,
                    "pf": 1,
                    "aw": 0,
                    "wid": 0,
                    "wt": "C",
                    "wk": "0_C",
                    "wbn": null,
                    "wfg": null,
                    "blb": 99988,
                    "blab": 99976,
                    "bl": 99976,
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
                }
              ],
              "mgcc": 0,
              "fscc": 0
            },
            {
              "tid": "1772861656264539648",
              "gid": 62,
              "cc": "PGC",
              "gtba": 12,
              "gtwla": -12,
              "bt": 1711518131687,
              "ge": [
                1,
                11
              ],
              "bd": [
                {
                  "tid": "1772861656264539648",
                  "tba": 12,
                  "twla": -12,
                  "bl": 99988,
                  "bt": 1711518131687,
                  "gd": {
                    "wp": null,
                    "lw": null,
                    "orl": [
                      12,
                      12,
                      8,
                      8,
                      3,
                      8,
                      12,
                      12,
                      9,
                      9,
                      9,
                      8,
                      7,
                      7,
                      7,
                      9,
                      9,
                      7,
                      7,
                      7,
                      7,
                      11,
                      11,
                      11,
                      8,
                      5,
                      5,
                      6,
                      6,
                      6,
                      6,
                      4,
                      1,
                      8,
                      6,
                      6
                    ],
                    "bwp": null,
                    "now": 3888,
                    "nowpr": [
                      6,
                      3,
                      3,
                      3,
                      4,
                      6
                    ],
                    "snww": null,
                    "esb": {
                      "1": [
                        6,
                        7
                      ],
                      "2": [
                        8,
                        9,
                        10
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
                        19,
                        20
                      ],
                      "6": [
                        21,
                        22
                      ],
                      "7": [
                        25,
                        26
                      ],
                      "8": [
                        28,
                        29
                      ]
                    },
                    "ebb": {
                      "1": {
                        "fp": 6,
                        "lp": 7,
                        "bt": 1,
                        "ls": 2
                      },
                      "2": {
                        "fp": 8,
                        "lp": 10,
                        "bt": 1,
                        "ls": 2
                      },
                      "3": {
                        "fp": 12,
                        "lp": 14,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 15,
                        "lp": 16,
                        "bt": 1,
                        "ls": 2
                      },
                      "5": {
                        "fp": 18,
                        "lp": 20,
                        "bt": 2,
                        "ls": 1
                      },
                      "6": {
                        "fp": 21,
                        "lp": 22,
                        "bt": 1,
                        "ls": 2
                      },
                      "7": {
                        "fp": 25,
                        "lp": 26,
                        "bt": 1,
                        "ls": 2
                      },
                      "8": {
                        "fp": 28,
                        "lp": 29,
                        "bt": 2,
                        "ls": 1
                      }
                    },
                    "es": {
                      "1": [
                        6,
                        7
                      ],
                      "2": [
                        8,
                        9,
                        10
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
                        19,
                        20
                      ],
                      "6": [
                        21,
                        22
                      ],
                      "7": [
                        25,
                        26
                      ],
                      "8": [
                        28,
                        29
                      ]
                    },
                    "eb": {
                      "1": {
                        "fp": 6,
                        "lp": 7,
                        "bt": 1,
                        "ls": 2
                      },
                      "2": {
                        "fp": 8,
                        "lp": 10,
                        "bt": 1,
                        "ls": 2
                      },
                      "3": {
                        "fp": 12,
                        "lp": 14,
                        "bt": 2,
                        "ls": 1
                      },
                      "4": {
                        "fp": 15,
                        "lp": 16,
                        "bt": 1,
                        "ls": 2
                      },
                      "5": {
                        "fp": 18,
                        "lp": 20,
                        "bt": 2,
                        "ls": 1
                      },
                      "6": {
                        "fp": 21,
                        "lp": 22,
                        "bt": 1,
                        "ls": 2
                      },
                      "7": {
                        "fp": 25,
                        "lp": 26,
                        "bt": 1,
                        "ls": 2
                      },
                      "8": {
                        "fp": 28,
                        "lp": 29,
                        "bt": 2,
                        "ls": 1
                      }
                    },
                    "rs": null,
                    "fs": null,
                    "ssaw": 0,
                    "ptbr": null,
                    "sc": 1,
                    "gwt": -1,
                    "fb": null,
                    "ctw": 0,
                    "pmt": null,
                    "cwc": 0,
                    "fstc": null,
                    "pcwc": 0,
                    "rwsp": null,
                    "hashr": "0:12;12;7;7;8;6#12;12;7;7;5;4#8;9;7;7;5;1#8;9;9;11;6;8#3;9;9;11;6;6#8;8;7;11;6;6#MV#12.0#MT#1#MG#0#",
                    "ml": 2,
                    "cs": 0.3,
                    "rl": [
                      12,
                      12,
                      8,
                      8,
                      3,
                      8,
                      12,
                      12,
                      9,
                      9,
                      9,
                      8,
                      7,
                      7,
                      7,
                      9,
                      9,
                      7,
                      7,
                      7,
                      7,
                      11,
                      11,
                      11,
                      8,
                      5,
                      5,
                      6,
                      6,
                      6,
                      6,
                      4,
                      1,
                      8,
                      6,
                      6
                    ],
                    "sid": "1772861656264539648",
                    "psid": "1772861656264539648",
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
                }
              ],
              "mgcc": 0,
              "fscc": 0
            }
          ]
        },
        "err": null
      }';

      $betHistory = json_decode($json_str);
      return response()->json($betHistory);
    }

    // 取得投注纪录 加总
    public function getBetSummary(Request $request) {

      $json_str = '{
        "dt": {
          "lut": 1711518214889,
          "bs": {
            "gid": 62,
            "bc": 7,
            "btba": 60,
            "btwla": -32.4,
            "lbid": 1772862005239021000
          }
        },
        "err": null
      }';

      $data = json_decode($json_str);
      return response()->json($data);
    }

    // 取得钱包
    public function getGameWallet(Request $request) {

      $json_str = '{
        "dt": {
          "cc": "PGC",
          "tb": 99967.6,
          "pb": 0,
          "cb": 99967.6,
          "tbb": 0,
          "tfgb": 0,
          "rfgc": 0,
          "inbe": false,
          "infge": false,
          "iebe": false,
          "iefge": false,
          "ch": {
            "k": "0_C",
            "cid": 0,
            "cb": 99967.6
          },
          "p": null,
          "ocr": null
        },
        "err": null
      }';

      $data = json_decode($json_str);
      return response()->json($data);
    }



    // 随机产生投注结果
    protected function getRandomBetInfo($limit, $min, $max) {

      // 循环填充数组
      for ($i = 0; $i < $limit; $i++) {
        // 生成随机数并添加到数组中
        $reponse[] = mt_rand($min, $max);
      }

      return $reponse;

    }

    // 计算连线 预设6x6
    protected function findCommonNumbers($map) {
        $rowCount = 6;
        $colCount = 6;
        $result = [];
        
        // Initialize an array to keep track of seen numbers in each row
        $seenNumbers = [];
        for ($i = 0; $i < $rowCount; $i++) {
            $seenNumbers[] = [];
        }
        
        // Loop through each column
        for ($col = 0; $col < $colCount; $col++) {
            // Get the current number in the column
            $currentNumber = $map[$col];
            
            // Check if this number has been seen in all previous rows
            $common = true;
            for ($row = 0; $row < $rowCount; $row++) {
                if (!in_array($currentNumber, $seenNumbers[$row])) {
                    $common = false;
                    break;
                }
            }
            
            // If the number is common, add it to the result
            if ($common) {
                $result[] = $col;
                
                // Update the seen numbers array for each row
                for ($row = 0; $row < $rowCount; $row++) {
                    $seenNumbers[$row][] = $currentNumber;
                }
            }
        }

      return $result;
  }


  protected function test() {

    $mapStr = "[4,6,8,5,8,5,12,4,9,5,3,5,2,12,11,12,11,5,7,2,5,6,5,5,4,4,11,7,7,9,2,4,7,4,4,12]";
    
    $map = json_decode($mapStr, true);

    // 调用函数并打印结果
    $result = $this->findMatchingGroups($map);
    echo "第一列、第二列和第三列中出现相同数字的组合：" . PHP_EOL;
    foreach ($result as $group) {
        echo "[" . implode(', ', $group) . "]" . PHP_EOL;
    }

    dd($result);
  }
  
// 计算第一列、第二列和第三列中出现相同数字的组合
protected function findMatchingGroups($map) {
  $matchingGroups = [];

  // 遍历地图，每次跳过3个元素，即遍历每一列
  for ($i = 0; $i < count($map); $i += 3) {
      $col1 = $map[$i];
      $col2 = $map[$i + 1];
      $col3 = $map[$i + 2];

      // 判断相邻列中是否有相同的数字
      if ($col1 == $col2 && $col1 == $col3) {
          $matchingGroups[] = [$col1, $col2, $col3];
      }
  }

  return $matchingGroups;
}
}

