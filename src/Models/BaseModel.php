<?php


namespace Experteam\CisBase\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Touhidurabir\ModelSanitize\Sanitizable;

abstract class BaseModel extends Model
{

    use HasFactory;
    use BaseModelActive;
    use BaseModelDateFormat;
    use BaseModelPaginate;
    use Sanitizable;

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

}
