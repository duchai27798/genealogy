<?php


namespace App\Helpers;


class Helper
{
    public static function getCache($key, $object = null) {

        if ($object) {
            return $object[$key];
        }

        return session('cache') ? session('cache')[$key] : null;
    }
}
