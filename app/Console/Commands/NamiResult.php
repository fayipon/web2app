<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\NamiResult;

class NamiAutoResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nami:result';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $score = [0,0,0,0,1];

        // 取得賽事比分資料
        $return = NamiResult::where("status",1)->get();
        if ($return === false) {
            return false;
        }

        foreach ($return as $k => $v) {

            $rand = rand(0,4);
            $is_home_goal = $score[$rand];

            $rand = rand(0,4);
            $is_away_goal = $score[$rand];

            // 判斷時間是否為上半場
            $is_half = false;
            $left_min = $this->time_different(date("Y-m-d H:i:s"),"2023-03-29 09:45:45");
            if ($left_min < 5) {
                $is_half = true;
            }

            $data = array();
            // 主隊得分 
            if ($is_home_goal == 1) {
                $data['home_score'] = $v['home_score']+1;
                if ($is_half) {
                    $data['half_home_score'] = $v['half_home_score']+1;
                }
            }
            // 客隊得分 
            if ($is_away_goal == 1) {
                $data['away_score'] = $v['away_score']+1;
                if ($is_half) {
                    $data['half_away_score'] = $v['half_away_score']+1;
                }
            }

            // 需變動時才更新
            if ($data != array()) {
                NamiResult::where("id",$v['id'])->update($data);
            }

        }
        echo "NamiAutoResult\n";
    }


    // 計算時間差 秒數
    protected function time_different($start_time, $end_time) {
        $minute = intval(ceil((strtotime($end_time)-strtotime($start_time))/60));
        return $minute;
    }
}
