<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Agent extends CacheModel
{
	use HasFactory;
	
	public $timestamps = false;
	protected $table = "agent";

    public static function getAccount($data) {

        // 緩存時間
        $cacheAliveTime = 3600;

        // 緩存Key
        $cacheKey = (new static)->getCacheKey($data , __FUNCTION__);

        return Cache::remember($cacheKey, $cacheAliveTime, function () use ($data) {
			$agent_id = $data['agent_id'];
			
            $data = self::where('id', $agent_id)->first();
            
            return $data['account'];
        });
    }
}
