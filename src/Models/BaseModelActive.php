<?php


namespace Experteam\CisBase\Models;


use Illuminate\Database\Eloquent\Builder;

trait BaseModelActive
{

    public function scopeIsActive($query, $table = null): Builder
    {

        if (empty($table))
            return $query->where('is_active', true);
        else
            return $query->where("$table.is_active", true);

    }

    public function scopeIsNotActive($query, $table = null): Builder
    {

        if (empty($table))
            return $query->where('is_active', false);
        else
            return $query->where("$table.is_active", false);

    }

    public function isActive(): bool
    {

        return $this->is_active;

    }

    public function isNotActive(): bool
    {

        return !$this->is_active;

    }

    public function getIsActiveAttribute($value): bool
    {

        return boolval($value);

    }

}
