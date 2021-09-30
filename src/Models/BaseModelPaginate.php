<?php


namespace Experteam\CisBase\Models;


use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Throwable;

trait BaseModelPaginate
{

    /**
     * @param Builder $query
     * @return Builder
     * @throws Exception|Throwable
     */
    public function scopeCustomPaginate(Builder $query): Builder
    {

        $offset = request()->query
            ->get('offset', 0);

        $limit = request()->query
            ->get('limit', 50);

        if ($limit > 1000)
            throw new Exception(__('general.more_than_1000'));

        request()->collect('order')
            ->each(function ($direction, $field) use ($query) {

                throw_unless(
                    in_array(strtoupper($direction), ['ASC', 'DESC']),
                    Exception::class,
                    __('general.order_invalid_direction', ['value' => $direction])
                );

                throw_unless(
                    Schema::hasColumn($query->getModel()->getTable(), $field),
                    Exception::class,
                    __('general.order_invalid_field', ['field' => $field])
                );

                $query->orderBy($field, $direction);

            });

        return $query->offset($offset)
            ->limit($limit);

    }

}
