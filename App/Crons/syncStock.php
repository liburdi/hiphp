<?php
/**
 * Created by PhpStorm.
 * User: 26709
 * Date: 2019-08-08
 * Time: 17:28
 */

namespace App\Crons;

use App\Models\RedisClient;
use src\Common\Exceptions\InvalidConfigException;

class SyncStock
{
    /**
     * 同步db库存到redis
     * @describe 一分钟一次
     * @throws InvalidConfigException
     */
    public function syncStock()
    {

        $itemIds=[1,2,3];

        $redis = RedisClient::connect();

        foreach ($itemIds as $itemId){
            //db查询操作略,预估100ms
            usleep(100*1000);

            $redis->set($itemId."_stock",9);
        }
    }


}