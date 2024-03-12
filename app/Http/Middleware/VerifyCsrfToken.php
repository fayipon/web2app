<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/crawler/sport_match',
        '/crawler/sport_rate',
        '/crawler/sport_result',
        '/crawler/image_series',
        '/crawler/image_team',
        '/broadcast/client',
        "/result/result",
        "/result/retry",
        "/result/game",
        "/result/order",
        "/result/living",
        
        "/redis/ant_quest",
        "/redis/ant_questa",
        "/redis/ant_questb",
        "/redis/ant_questc",
        "/redis/ant_questd",
        
        "/translate/team",
        "/translate/sport",
        "/translate/league",
        
        "/google/team",
        "/google/sport",
        "/google/league",

        "/ant/game_list",
        "/ant/series_list",
        "/ant/team_list",
        "/ant/type_list",
        "/ant/match_list",
        "/ant/rate_list",
        "/ant/notice_list",
        
        "/antb/game_list",
        "/antb/series_list",
        "/antb/team_list",
        "/antb/type_list",
        "/antb/match_list",
        "/antb/rate_list",

        "/baseball/living_list",
        "/baseball/early_list",
        "/baseball/hidden_list",
        "/baseball/end_list",

        "/basketball/living_list",
        "/basketball/early_list",
        "/basketball/hidden_list",
        "/basketball/end_list",

        "/soccer/living_list",
        "/soccer/early_list",
        "/soccer/hidden_list",
        "/soccer/end_list",

        "/sport/syncRisk",
        "/sport/setRisk",
        
        '/chatapi/add_chat',
        '/api/test',
        '/api/match_index',
        '/api/match_sport',

        '/maintain/lsport_events',
        '/maintain/game_order',
        '/maintain/balance_logs',
        '/maintain/lsport_fixture',

        '/lsport_snapshot/updateByLogs',

        // 賽事Redis 腳本
        '/lsport_fixture/FoolballTW',
        '/lsport_fixture/FoolballEN',
        '/lsport_fixture/FoolballCN',
        
        '/lsport_fixture/BaseballTW',
        '/lsport_fixture/BaseballEN',
        '/lsport_fixture/BaseballCN',
        
        '/lsport_fixture/BasketballTW',
        '/lsport_fixture/BasketballEN',
        '/lsport_fixture/BasketballCN',
        
        '/lsport_fixture/IcehockeyTW',
        '/lsport_fixture/IcehockeyEN',
        '/lsport_fixture/IcehockeyCN',

        '/lsport_fixture/AmericanFootballTW',
        '/lsport_fixture/AmericanFootballEN',
        '/lsport_fixture/AmericanFootballCN',

        // 賽事Redis 腳本 Risk
        '/lsport_fixture/RiskFoolballTW',
        '/lsport_fixture/RiskFoolballEN',
        '/lsport_fixture/RiskFoolballCN',
        
        '/lsport_fixture/RiskBaseballTW',
        '/lsport_fixture/RiskBaseballEN',
        '/lsport_fixture/RiskBaseballCN',
        
        '/lsport_fixture/RiskBasketballTW',
        '/lsport_fixture/RiskBasketballEN',
        '/lsport_fixture/RiskBasketballCN',
        
        '/lsport_fixture/RiskIcehockeyTW',
        '/lsport_fixture/RiskIcehockeyEN',
        '/lsport_fixture/RiskIcehockeyCN',
        
        '/lsport_fixture/RiskAmericanFootballTW',
        '/lsport_fixture/RiskAmericanFootballEN',
        '/lsport_fixture/RiskAmericanFootballCN',
        
        '/delay_bet'

    ];
}
