<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\NamiRate;
use App\Models\NamiResult;

class NamiAutoRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nami:rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Nami格式假數據賽事賠率變動';

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

        // 取得賽事賠率資料
        $return = NamiRate::where("status",1)->get();
        if ($return === false) {
            return false;
        }

        // 變更當前賽事賠率
        foreach ($return as $kk => $vv) {

            $rate_data = json_decode($vv['rate_data'],true);

            foreach ($rate_data as $k => $v) {
                $rand = rand(0,4);
                $rand_seed = [0,0,0,0.1,-0.1];
                $offset = $rand_seed[$rand];
                if ($offset == 0) {
                    continue;
                }
    
                switch ($k) {
                    // 全場獨贏
                    case "spf":
                        $rate_data[$k][0] = round(($rate_data[$k][0]+$offset),2)+0;
                        $rate_data[$k][1] = round(($rate_data[$k][1]+($offset*5)),2)+0;
                        $rate_data[$k][2] = round(($rate_data[$k][2]-$offset),2)+0;
                        break;
                    // 全場讓球
                    case "rq":
                        $rate_data[$k][1] = round(($rate_data[$k][1]+$offset),2)+0;
                        $rate_data[$k][2] = round(($rate_data[$k][2]+($offset*5)),2)+0;
                        $rate_data[$k][3] = round(($rate_data[$k][3]-$offset),2)+0;
                        break;
                    // 波膽
                    case "bf":
                        // 勝 比分
                        for ($ii=0;$ii<13;$ii++) {
                            $d = $ii+1;
                            $rate_data[$k][$ii] =  round(($rate_data[$k][$ii]+($offset*$d)),2)+0;
                        }
    
                        // 平
                        for ($ii=13;$ii<17;$ii++) {
                            $d = $ii-12;
                            $rate_data[$k][$ii] = round(($rate_data[$k][$ii]+($offset*2*$d)),2)+0;
                        }
    
                        // 負 比分
                        for ($ii=17;$ii<31;$ii++) {
                            $d = $ii-16;
                            $rate_data[$k][$ii] = round(($rate_data[$k][$ii]-($offset*$d)),2)+0;
                        }
                        break;
                    case "jq":
                        for ($ii=0;$ii<8;$ii++) {
                            $d = $ii+1;
                            $rate_data[$k][$ii] = round(($rate_data[$k][$ii]+($offset*$d)),2)+0;
                        }
                        break;
                    case "bqc":
                        for ($ii=0;$ii<9;$ii++) {
                            $d = $ii+1;
                            $rate_data[$k][$ii] = round(($rate_data[$k][$ii]+($offset*$d)),2)+0;
                        }
                        break;
                    // 全場獨贏
                    case "fwin":
                        $rate_data[$k][0] = round(($rate_data[$k][0]+$offset),2)+0;
                        $rate_data[$k][1] = round(($rate_data[$k][1]+($offset*5)),2)+0;
                        $rate_data[$k][2] = round(($rate_data[$k][2]-$offset),2)+0;
                        break;
                    // 全場讓球
                    case "fhcap":
                        $rate_data[$k][1] = round(($rate_data[$k][1]+$offset),2)+0;
                        $rate_data[$k][2] = round(($rate_data[$k][2]+($offset*5)),2)+0;
                        $rate_data[$k][3] = round(($rate_data[$k][3]-$offset),2)+0;
                        break;
                    // 全場大小
                    case "flarge":
                        $rate_data[$k][1] = round(($rate_data[$k][1]+$offset),2)+0;
                        $rate_data[$k][2] = round(($rate_data[$k][2]+($offset*5)),2)+0;
                        $rate_data[$k][3] = round(($rate_data[$k][3]-$offset),2)+0;
                        break;
                    // 半場獨贏
                    case "hwin":
                        $rate_data[$k][0] = round(($rate_data[$k][0]+$offset),2)+0;
                        $rate_data[$k][1] = round(($rate_data[$k][1]+($offset*5)),2)+0;
                        $rate_data[$k][2] = round(($rate_data[$k][2]-$offset),2)+0;
                        break;
                    // 半場讓球
                    case "hhcap":
                        $rate_data[$k][1] = round(($rate_data[$k][1]+$offset),2)+0;
                        $rate_data[$k][2] = round(($rate_data[$k][2]+($offset*5)),2)+0;
                        $rate_data[$k][3] = round(($rate_data[$k][3]-$offset),2)+0;
                        break;
                    // 半場大小
                    case "hlarge":
                        $rate_data[$k][1] = round(($rate_data[$k][1]+$offset),2)+0;
                        $rate_data[$k][2] = round(($rate_data[$k][2]+($offset*5)),2)+0;
                        $rate_data[$k][3] = round(($rate_data[$k][3]-$offset),2)+0;
                        break;
                } 
            }

            $rate_data = json_encode($rate_data);
                
            $return = NamiRate::where("id",$vv['id'])->update([
                "rate_data" => $rate_data
            ]);

            $return = NamiResult::where("id",$vv['id'])->update([
                "rate_data" => $rate_data
            ]);
        }

        echo "NamiAutoRate\n";
    }
}
