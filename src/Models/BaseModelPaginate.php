<?php


namespace Experteam\CisBase\Models;


use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

trait BaseModelPaginate
{

    /**
     * @param Builder $query
     * @return Builder
     * @throws Exception
     */
    public function scopeCustomPaginate(Builder $query): Builder
    {

        $offset = request()->query
            ->get('offset', 0);

        $limit = request()->query
            ->get('limit', 50);

        if ($limit > 1000)
            throw new Exception(__('general.more_than_1000'));

        $order = request()->query
            ->get('order', []);

        if (!is_array($order))
            throw new Exception(__('general.order_invalid_format'));

        foreach ($order as $field => $direction) {

            if (!in_array(strtoupper($direction), ['ASC', 'DESC']))
                throw new Exception(__('general.order_invalid_direction', ['value' => $direction]));

            if (!Schema::hasColumn($query->getModel()->getTable(), $field))
                throw new Exception(__('general.order_invalid_field', ['field' => $field]));

            $query->orderBy($field, $direction);

        }

        return $query->offset($offset)
            ->limit($limit);

    }

}
