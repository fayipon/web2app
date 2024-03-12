<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class LsportLeague extends CacheModel
{
	use HasFactory;
	
	public $timestamps = false;
	protected $table = "lsport_league";

    public static function getName($data) {

        // 緩存時間
        $cacheAliveTime = 60;

        // 緩存Key
        $cacheKey = (new static)->getCacheKey($data , __FUNCTION__);

        return Cache::remember($cacheKey, $cacheAliveTime, function () use ($data) {
			$league_id = $data['league_id'];
			$api_lang = $data['api_lang'];
			
            $data = self::where('league_id', $league_id)->first();
            
			// 預設值
            $name = $data['name_en'];
            if (isset($data['name_' . $api_lang]) && !empty($data['name_' . $api_lang])) {
                $name = $data['name_' . $api_lang];
            }
            return $name;
        });
    }
    
    public static function getStatus($data) {

        // 緩存時間
        $cacheAliveTime = 60;

        // 緩存Key
        $cacheKey = (new static)->getCacheKey($data , __FUNCTION__);

        return Cache::remember($cacheKey, $cacheAliveTime, function () use ($data) {
			$league_id = $data['league_id'];

            $data = self::where('league_id', $league_id)->select('status')->first();
            $return = $data;

            return $return;
        });
    }

}
