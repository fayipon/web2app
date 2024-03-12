<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

use App\Models\Agent;
use App\Models\Player;
use App\Models\GameOrder;
use App\Models\GameResult;
// use App\Models\AntGameList;
// use App\Models\AntSeriesList;
// use App\Models\AntTeamList;
use App\Models\LsportSport;
use App\Models\LsportLeague;
use App\Models\LsportTeam;

class SportSeriesController extends Controller {

    protected $current = "sport_series";
    
    // 狀態值
    protected $status = array("已取消","等待審核","等待開獎","等待派獎","已開獎");
        
    // 首頁
    public function index(Request $request) {
            
        $this->isLogin();

        $this->permission($this->current);
        
        //////////////////
            
        $input = $this->getRequest($request);
        $session = Session::all();

        // 判斷輸入值
        if (!isset($input['sport_id']) || ($input['sport_id'] == "")) {
            $input['sport_id'] = 1;
        }
        $this->assign("search",$input);

        $query_str = http_build_query($input);
        $this->assign("search_str",$query_str);

        //////////////////

        // 體育列表
        // $game_list = AntGameList::where("status",1)->get();
        $game_list = LsportSport::where("status", 1)->get();

        $data = array();
        foreach ($game_list as $k => $v) {
            $data[$v['id']] = $v['name_tw'];
        }
        $game_list = $data;
        $this->assign("game_list",$game_list);

        // where condition
        // $league_list = AntSeriesList::where("id", ">=", 1);
        $league_list = LsportLeague::where("status", 1);
        
        if (isset($input['sport_id']) && ($input['sport_id'] != "")) {
            $league_list = $league_list->where("sport_id", $input['sport_id']);
        } 
        if (isset($input['is_hot']) && ($input['is_hot'] != "")) {
            $league_list = $league_list->where("is_hot", $input['is_hot']);
        } 
        if (isset($input['status']) && ($input['status'] != "")) {
            $league_list = $league_list->where("status", $input['status']);
        } 

        $return = $league_list->orderBy(
            "status","DESC"
        )->orderBy(
            "is_hot","DESC"
        )->orderBy(
            "id","ASC"
        )->paginate(
            $this->per_page
        );
        // 取得用戶資料
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return redirect('/sport/series');
        }

        foreach ($return as $k => $v) {
            $v['game_name'] = $game_list[$v['sport_id']];
        }

        $this->assign("data",$return);

        return view('sport_series.index',$this->data);
    }

        
    // 測試用
    public function active_series(Request $request) {
            
        $this->isLogin();

        $this->permission($this->current);
        
        //////////////////
            
        $input = $this->getRequest($request);
            $session = Session::all();

        //////////////////

        $id = $input['id'];
        unset($input['id']);
        
        $query_str = http_build_query($input);

        // $return = AntSeriesList::where("id",$id)->first();
        $return = LsportLeague::where("league_id", $id)->first();
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "01");
            return back()->withInput();
        }

        $status = $return['status'];

        if ($status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        // $return = AntSeriesList::where(
        //     "id", $id
        // )->update([
        //     "status" => $status
        // ]);
        $return = LsportLeague::where(
            "league_id", $id
        )->update([
            "status" => $status
        ]);
        if ($return === false) {
            $this->error(__CLASS__, __FUNCTION__, "02");
            return back()->withInput();
        }

        $this->success(__CLASS__, __FUNCTION__, "01");
    //  return redirect('/sport/series')->withInput();
        return back()->withInput();
    }

    // 測試
    // public function test(Request $request) {

    //     /*
    //     $results = AntTeamList::select('*', \DB::raw('COUNT(id) as total'))
    //         ->groupBy('index_key')
    //         ->havingRaw('COUNT(id) > 1')
    //         ->orderBy("index_key","ASC")
    //         ->get();

    //     $data = array();
    //     foreach ($results as $k => $v) {

    //     $data[] = $v['index_key'];
    //     }

    //     echo implode(",",$data);
    //     */

    //     $subquery = AntTeamList::select('index_key')
    //         ->selectRaw('COUNT(id) as total')
    //         ->groupBy('index_key')
    //         ->havingRaw('COUNT(id) > 1')
    //         ->toSql();

    //     $results = AntTeamList::select('ant_team_list.*')
    //         ->whereIn('index_key', function($query) use ($subquery) {
    //             $query->select('index_key')
    //                 ->from(DB::raw("($subquery) as subquery"));
    //         })
    //         ->orderBy('index_key', 'asc')
    //         ->get();

    //     dd($results);
    //     foreach ($results as $k => $v) {
    //         if ($v['id'] != $v['team_id']) {
    //             // AntTeamList::where("id",$v['id'])->delete();
    //         }
    //     }

    //     ///////////////////////

    // }


}

