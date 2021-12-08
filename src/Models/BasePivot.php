<?php

namespace Experteam\CisBase\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

abstract class BasePivot extends Pivot
{
    use HasFactory;
    use BaseModelActive;
    use BaseModelDateFormat;
    use BaseModelPaginate;

    public $incrementing = true;

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
