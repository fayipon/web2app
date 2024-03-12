<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use DB;

class LsportMarketBet extends CacheModel
{
	use HasFactory;
	
	public $timestamps = false;
	protected $table = "lsport_market_bet";

    public static function getName($data) {

        // 緩存時間
        $cacheAliveTime = 3600;

        // 緩存Key
        $cacheKey = (new static)->getCacheKey($data , __FUNCTION__);

        return Cache::remember($cacheKey, $cacheAliveTime, function () use ($data) {
			$bet_id = $data['bet_id'];
			$api_lang = $data['api_lang'];
			
            $data = self::where('bet_id', $bet_id)->first();
            
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
        $cacheAliveTime = 3600;

        // 緩存Key
        $cacheKey = (new static)->getCacheKey($data , __FUNCTION__);

        return Cache::remember($cacheKey, $cacheAliveTime, function () use ($data) {
			$bet_id = $data['bet_id'];

            $data = self::where('bet_id', $bet_id)->select('status')->first();
            $return = $data;

            return $return;
        });
    }

    // 取得相差最小的資料做為main-line
    public static function getMainLine($data) {

        // 緩存時間
        $cacheAliveTime = 1;

        // 緩存Key
        $cacheKey = (new static)->getCacheKey($data , __FUNCTION__);
        
        return Cache::remember($cacheKey, $cacheAliveTime, function () use ($data) {
            $fixtureId = $data['fixture_id'];
            $marketId = $data['market_id'];
            
            $return = DB::table('lsport_market_bet as main')
            ->select(
                'main.base_line',
                DB::raw('MIN(main.price) as min_price'),
                DB::raw('MAX(main.price) as max_price'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT `bet_id` ORDER BY `price` ASC), ",", 1) as min_bet_id'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT `bet_id` ORDER BY `price` DESC), ",", 1) as max_bet_id'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT `status` ORDER BY `price` ASC), ",", 1) as min_price_status'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT `status` ORDER BY `price` DESC), ",", 1) as max_price_status')
            )
            ->where('fixture_id', $fixtureId)
            ->where('market_id', $marketId)
            ->groupBy('main.base_line')
            ->get();

            $minDiff = PHP_FLOAT_MAX; // 初始化一个最大的差异值
            $selectedCombination = null; // 初始化一个空的选择组合

            
            foreach ($return as $combination) {

                if (($combination->min_price_status == 2) && ($combination->max_price_status == 2)) {
                    continue;
                }
                $minPrice = floatval($combination->min_price);
                $maxPrice = floatval($combination->max_price);
                $priceDiff = abs($maxPrice - $minPrice);
                
                if ($priceDiff < $minDiff) {
                    $minDiff = $priceDiff;
                    $selectedCombination = $combination;
                }
            }

            if ($selectedCombination == null) {
                return null;
            }

            $base_line = $selectedCombination->base_line;
            $min_price = $selectedCombination->min_price;
            $max_price = $selectedCombination->max_price;
            $different_price = abs($min_price-$max_price);

            $data = [
                "fixture_id" => $fixtureId,
                "market_id" => $marketId,
                "base_line" => $base_line,
                "min_price" => $min_price,
                "max_price" => $max_price,
                "different_price" => $different_price,
            ];

            return $data;
        });

    }

}
