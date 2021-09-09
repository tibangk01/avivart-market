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
    public static function randomAlphaNumeric($useNumerics = false, $length = 8 )
    {
        if($useNumerics){
            return substr(str_shuffle(self::$alphas.''.self::$numerics),0, $length);
        }
        return substr(str_shuffle(self::$alphas),0, $length);
    }
}
