<?php


namespace Experteam\CisBase\Facades;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class RedisClient
{

    public function set(string $key, $data, $exp = null): void
    {

        if (empty($exp) || $exp < 1)
            Redis::set(
                $key,
                to_string($data)
            );
        else
            Redis::set(
                $key,
                to_string($data),
                'EX',
                $exp
            );

    }

    public function del(string $key): int
    {

        return Redis::del($key);

    }

    public function hSet($hash, $field, $data): void
    {

        if ($data instanceof Model)
            $data = json_encode($data->toArray());
        else
            $data = json_encode($data);

        Redis::hset($hash, $field, $data);

    }

    public function get(string $key, $object = true): object|string|false
    {

        if ($object)
            return json_decode(Redis::get($key));
        else
            return Redis::get($key);

    }

    public function exists(string|array $key): bool
    {

        return Redis::exists($key) >= 1;

    }

    public function hexists($hash, $field): bool
    {

        return !is_null($this->hget($hash, $field));

    }

    public function hget($hash, $field): object|false
    {

        return json_decode(Redis::hGet($hash, $field));

    }

}
