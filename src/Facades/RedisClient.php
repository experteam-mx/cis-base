<?php


namespace Experteam\CisBase\Facades;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class RedisClient
{

    /*
     * Values
     */

    public function set(string $key, $data, $exp = null): void
    {

        if (empty($exp) || $exp < 1)
            Redis::set(
                config('cis-base.redis.prefix') . $key,
                to_string($data)
            );
        else
            Redis::set(
                config('cis-base.redis.prefix') . $key,
                to_string($data),
                'EX',
                $exp
            );

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

    public function del(string $key): int
    {

        return Redis::del(config('cis-base.redis.prefix') . $key);

    }

    /*
     * Hashes
     */

    public function hset($key, $field, $data): void
    {

        if ($data instanceof Model)
            $data = json_encode($data->toArray());
        else
            $data = json_encode($data);

        Redis::hset(config('cis-base.redis.prefix') . $key, $field, $data);

    }

    public function hexists($key, $field): bool
    {

        return !is_null($this->hget($key, $field));

    }

    public function hget($key, $field): object|null
    {

        return json_decode(Redis::hGet($key, $field));

    }

    public function hgetall($key, $object = true): array
    {

        if ($object)
            return array_map(
                fn($item) => json_decode($item),
                Redis::hGetAll($key)
            );
        else
            return Redis::hGetAll($key);

    }

}