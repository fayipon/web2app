<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class LsportTeam extends CacheModel
{
	use HasFactory;
	
	public $timestamps = false;
	protected $table = "lsport_team";

    public static function getName($data) {

        // 緩存時間
        $cacheAliveTime = 60;

        // 緩存Key
        $cacheKey = (new static)->getCacheKey($data , __FUNCTION__);

        return Cache::remember($cacheKey, $cacheAliveTime, function () use ($data) {
			$team_id = $data['team_id'];
			$api_lang = $data['api_lang'];
			
            $data = self::where('team_id', $team_id)->first();
            if ($data == null) {
                return "--";
            }
            
			// 預設值
            $name = $data['name_en'];
            if (isset($data['name_' . $api_lang]) && !empty($data['name_' . $api_lang])) {
                $name = $data['name_' . $api_lang];
            }
            return $name;
        });
    }
}
