<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\NamiMatch;
use App\Models\NamiRate;
use App\Models\NamiResult;

class NamiAutoMatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nami:match';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Nami格式假數據自動生成賽事資料';

    // 初始設定
    protected $match;
    protected $rate;
    protected $result;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Nami Match
        $game_limit = 10;
        
        ////////////////////////////////////

        // 初始資料
        $this->create_init_data();

        // 賽事刪除
        $this->delete_soccer_match();
        
        ////////////////////////////////////

        // 看現有已有幾場 再決定是否增加
        $return = NamiMatch::where("status",1)->get();
        if ($return === false) {
            return 0;
        }

        $count = count($return);

        ////////////////////////////////////

        for($i=1;$i<=$game_limit-$count;$i++) {
            
            $ran = rand(0,49);
            
            // 新增match 資料
            $new_match = $this->match[$ran];
            $new_match['create_time'] = date("Y-m-d H:i:s",time()+60*$i);
            $id = NamiMatch::insertGetId($new_match);
                
            $issue = rand(19999999,99999999);
            NamiMatch::where("id",$id)->update([
                "match_id" => $id,
                "issue" => $issue,
                "issue_num" => $issue
            ]);

            // 創建result 資料
            $new_result = $this->result[$ran];
            $new_result['create_time'] = $new_match['create_time'];
            $new_result['last_update'] = $new_match['create_time'];
            $match_time = strtotime(date("Y-m-d H:i:s",time()+60*$i));
            
            $id = NamiResult::insertGetId($new_result);
            NamiResult::where("id",$id)->update([
                "issue_num" => $issue,
                "match_time" => $match_time
            ]);

            // nami match 表
            $this->create_soccer_match($ran,$i);
            
            // nami rate 表
            $this->create_soccer_rate($ran,$i);

            NamiRate::where("id",$id)->update([
                "match_time" => strtotime($new_match['create_time']),
                "issue_num" => $issue
            ]);

        }

        echo "NamiAutoMatch Success!\n";
    }

    // 足球賽事
    protected function create_soccer_match($ran,$i) {

        return true;
    }

    // 足球賠率
    protected function create_soccer_rate($ran,$i) {

        // 新增 rate 資料 (足球)
        $rate_columns = [
            "spf" => [1,1,1], // 胜平负赔率，顺序：胜,平,负
            "rq" => [1.5,1,1,1], // 让球胜平负赔率，顺序：让球数,胜,平,负
            "bf" => [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1], // 比分赔率，顺序：1:0,2:0,2:1,3:0,3:1,3:2,4:0,4:1,4:2,5:0,5:1,5:2,胜其他,0:0,1:1,2:2,3:3,平其他,0:1,0:2,1:2,0:3,1:3,2:3,0:4,1:4,2:4,0:5,1:5,2:5,负其他
            "jq" => [1,1,1,1,1,1,1,1], // 进球总数赔率，顺序：0球,1球,2球,3球,4球,5球,6球,7+球
            //"bqc" => [1,1,1,1,1,1,1,1,1], // 半全场胜平负赔率，顺序：胜胜,胜平,胜负,平胜,平平,平负,负胜,负平,负负
            // 自定義
            "fwin" => [1,1,1], // 全場獨贏
            "fhcap" => [1.5,1,1,1], // 全場讓球
            "flarge" => [1.5,1,1,1], // 全場大小
            "hwin" => [1,1,1], // 半場獨贏
            "hhcap" => [1.5,1,1,1], // 半場讓球
            "hlarge" => [1.5,1,1,1], // 半場大小
        ];
            
        foreach ($rate_columns as $k => $v) {
            $rand = rand(0,4);
            $rand_seed = [0,0,0,0.1,-0.1];
            $offset = $rand_seed[$rand];
            if ($offset == 0) {
                continue;
            }

            switch ($k) {
                case "spf":
                    $rate_columns[$k][0] = round(($rate_columns[$k][0]+$offset),2)+0;
                    $rate_columns[$k][1] = round(($rate_columns[$k][1]+($offset*5)),2)+0;
                    $rate_columns[$k][2] = round(($rate_columns[$k][2]-$offset),2)+0;
                    break;
                case "rq":
                    $rate_columns[$k][1] = round(($rate_columns[$k][1]+$offset),2)+0;
                    $rate_columns[$k][2] = round(($rate_columns[$k][2]+($offset*5)),2)+0;
                    $rate_columns[$k][3] = round(($rate_columns[$k][3]-$offset),2)+0;
                    break;
                case "bf":
                    // 勝 比分
                    for ($ii=0;$ii<13;$ii++) {
                        $d = $ii+1;
                        $rate_columns[$k][$ii] =  round(($rate_columns[$k][$ii]+($offset*$d)),2)+0;
                    }

                    // 平
                    for ($ii=13;$ii<17;$ii++) {
                        $d = $ii-12;
                        $rate_columns[$k][$ii] = round(($rate_columns[$k][$ii]+($offset*2*$d)),2)+0;
                    }

                    // 負 比分
                    for ($ii=17;$ii<31;$ii++) {
                        $d = $ii-16;
                        $rate_columns[$k][$ii] = round(($rate_columns[$k][$ii]-($offset*$d)),2)+0;
                    }
                    break;
                case "jq":
                    for ($ii=0;$ii<8;$ii++) {
                        $d = $ii+1;
                        $rate_columns[$k][$ii] = round(($rate_columns[$k][$ii]+($offset*$d)),2)+0;
                    }
                    break;
                case "bqc":
                    for ($ii=0;$ii<9;$ii++) {
                        $d = $ii+1;
                        $rate_columns[$k][$ii] = round(($rate_columns[$k][$ii]+($offset*$d)),2)+0;
                    }
                    break;
                // 自定義
                case "fwin":
                        $rate_columns[$k][0] = round(($rate_columns[$k][0]+$offset),2)+0;
                        $rate_columns[$k][1] = round(($rate_columns[$k][1]+($offset*5)),2)+0;
                        $rate_columns[$k][2] = round(($rate_columns[$k][2]-$offset),2)+0;
                    break;
                case "fhcap":
                        $rate_columns[$k][1] = round(($rate_columns[$k][1]+$offset),2)+0;
                        $rate_columns[$k][2] = round(($rate_columns[$k][2]+($offset*5)),2)+0;
                        $rate_columns[$k][3] = round(($rate_columns[$k][3]-$offset),2)+0;
                    break;
                case "flarge":
                        $rate_columns[$k][1] = round(($rate_columns[$k][1]+$offset),2)+0;
                        $rate_columns[$k][2] = round(($rate_columns[$k][2]+($offset*5)),2)+0;
                        $rate_columns[$k][3] = round(($rate_columns[$k][3]-$offset),2)+0;
                    break;
                case "hwin":
                        $rate_columns[$k][0] = round(($rate_columns[$k][0]+$offset),2)+0;
                        $rate_columns[$k][1] = round(($rate_columns[$k][1]+($offset*5)),2)+0;
                        $rate_columns[$k][2] = round(($rate_columns[$k][2]-$offset),2)+0;
                    break;
                case "hhcap":
                        $rate_columns[$k][1] = round(($rate_columns[$k][1]+$offset),2)+0;
                        $rate_columns[$k][2] = round(($rate_columns[$k][2]+($offset*5)),2)+0;
                        $rate_columns[$k][3] = round(($rate_columns[$k][3]-$offset),2)+0;
                    break;
                case "hlarge":
                        $rate_columns[$k][1] = round(($rate_columns[$k][1]+$offset),2)+0;
                        $rate_columns[$k][2] = round(($rate_columns[$k][2]+($offset*5)),2)+0;
                        $rate_columns[$k][3] = round(($rate_columns[$k][3]-$offset),2)+0;
                    break;

            } 
        }

        //////////////////////////////////////
           
        // 新增match 資料
        $new_rate =  $this->rate[$ran];
        $new_rate['create_time'] = date("Y-m-d H:i:s",time()+60*$i);
        $new_rate['rate_data'] = json_encode($rate_columns,true);
        $id = NamiRate::insertGetId($new_rate);

        return json_encode($rate_columns,true);
    }

    // 創建初始資料
    protected function create_init_data() {

        // 初始 match data
        $match = array();
        for ($i=1;$i<=50;$i++) {
            $tmp = [
                "sport_id" => 1,
                "lottery_type" => 1,
                "issue" => 1,
                "issue_num" => 1,
                "home_name" => "主隊" . $i,
                "away_name" => "客隊" . $i,
                "is_same" => 0,
                "status" => 1
            ];

            $match[] = $tmp;
        }

        $this->match = $match;
        
        ////////////////////////////////////

        // 初始 rate data
        $rate = array();
        for ($i=1;$i<=50;$i++) {
            $tmp = [
                "sport_id" => 1,
                "comp" => "聯賽" . $i,
                "home" => "主隊" . $i,
                "away" => "客隊" . $i,
                "short_comp" => "League" . $i,
                "short_home" => "Home" . $i,
                "short_away" => "Away" . $i,
                "is_same" => 0,
                "rate_data" => "[]",
                "status" => 1
            ];

            $rate[] = $tmp;
        }

        $this->rate = $rate;

        ////////////////////////////////////

        // 初始化 result
        $result = array();
        for ($i=1;$i<=50;$i++) {
            $tmp = [
                "sport_id" => 1,
                "comp" => "聯賽" . $i,
                "home" => "主隊" . $i,
                "away" => "客隊" . $i,
                "short_comp" => "League" . $i,
                "short_home" => "Home" . $i,
                "short_away" => "Away" . $i,
                "issue_num" => "1",
                "match_time" => 1,
                "home_score" => 0,
                "away_score" => 0,
                "half_home_score" => 0,
                "half_away_score" => 0,
                "rate_data" => "[]",
                "status" => 1
            ];

            $result[] = $tmp;
        }

        $this->result = $result;
    }

    // 賽事刪除
    protected function delete_soccer_match() {
        
        // 如果創建時間已過十分鐘, 停止賽事
        $time = date("Y-m-d H:i:s",time()-600);

        NamiMatch::where("status",1)->where("create_time","<=",$time)->update([
            "status" => 2
        ]);

        NamiRate::where("status",1)->where("create_time","<=",$time)->update([
            "status" => 2
        ]);

        NamiRate::where("sell_status",1)->where("create_time","<=",$time)->update([
            "sell_status" => 2
        ]);
        
        NamiResult::where("status",1)->where("create_time","<=",$time)->update([
            "status" => 2
        ]);
        
        // 如果創建時間已過1天且status為0, 刪除賽事
        $time = date("Y-m-d H:i:s",time()-60*60*24);
        NamiMatch::where("status",0)->where("create_time","<=",$time)->delete();
        NamiRate::where("status",0)->where("create_time","<=",$time)->delete();
        NamiResult::where("status",0)->where("create_time","<=",$time)->delete();

    }
}
