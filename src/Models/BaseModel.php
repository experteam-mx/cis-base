<?php


namespace Experteam\CisBase\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{

    use HasFactory;
    use BaseModelActive;
    use BaseModelDateFormat;
    use BaseModelPaginate;

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

}
