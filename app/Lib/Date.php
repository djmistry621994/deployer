<?php

namespace App\Lib;

class Date
{

    public function get_timestamp($str = null)
    {
        if ($str === null) {
            $str = 'now';
        }
        return date(config('date.timestamp'), strtotime($str));
    }

    public function get_date($str = null)
    {
        if ($str === null) {
            $str = 'now';
        }
        return date(config('date.date'), strtotime($str));
    }

    public function get_time($str = null)
    {
        if ($str === null) {
            $str = 'now';
        }
        return date(config('date.time'), strtotime($str));
    }
}
