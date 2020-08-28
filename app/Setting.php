<?php

namespace App;

class Setting
{
    public static function get($key)
    {
        $settings = array_pluck(SetConfig::all()->toArray(), 'value', 'name');
        return (is_array($key)) ? array_only($settings, $key) : $settings[$key];
    }
}
