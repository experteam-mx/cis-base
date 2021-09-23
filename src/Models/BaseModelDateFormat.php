<?php


namespace Experteam\CisBase\Models;


use DateTimeInterface;

trait BaseModelDateFormat
{

    protected function serializeDate(DateTimeInterface $date): string
    {

        return $date->format(config('cis-base.formats.date_time'));

    }

}
