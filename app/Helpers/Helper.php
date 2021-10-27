<?php

namespace App\Helpers;

class Helper
{
    public static $alphas= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    public static $numerics = '1234567890@#$*%';


    /**
     * randomAlphaNumeric
     *
     * Generate random alpha or alphanimeric string
     *
     * @param bool $useNumeric use numeric and special characters or not
     * @param int $length radom string length
     * @return string
     */
    public static function randomAlphaNumeric(bool $useNumerics = false, int $length = 8): string
    {
        return ($useNumerics) ? mb_substr(str_shuffle(self::$alphas.''.self::$numerics), 0, $length) : mb_substr(str_shuffle(self::$alphas), 0, $length);
    }

    public static function defaultPassword()
    {
        return 'roottoor';
    }
}
