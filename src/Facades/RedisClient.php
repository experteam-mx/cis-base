<?php


namespace Experteam\CisBase\Facades;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class RedisClient
{

    public function set(string $key, $data, $exp = -1): void
    {

        if ($data instanceof Model)
            $data = json_encode($data->toArray());
        else
            $data = json_encode($data);

        Redis::set(
            config('cis-base.redis-prefix') . $key,
            $data,
            'EX',
            $exp
        );

    }

    public function del(string $key): int
    {

        return Redis::del(config('cis-base.redis-prefix') . $key);

    }

    public function hset($hash, $field, $data): void
    {

        if ($data instanceof Model)
            $data = json_encode($data->toArray());
        else
            $data = json_encode($data);

        Redis::hset(config('cis-base.redis-prefix') . $hash, $field, $data);

    }

    public function get(string $key): object|bool|null
    {

        return json_decode(Redis::get($key));

    }

    public function exists(string $key): bool
    {

        return Redis::exists($key) == 1;

    }

    public function hexists($hash, $field): bool
    {

        return !is_null($this->hget($hash, $field));

    }

    public function hget($hash, $field): object|bool|null
    {

        return json_decode(Redis::hget($hash, $field));

    }

}
