<?php


abstract class MoOAuthClientBasicEnum
{
    private static $constCacheArray = NULL;
    public static function getConstants()
    {
        if (!(self::$constCacheArray == NULL)) {
            goto ko7;
        }
        self::$constCacheArray = [];
        ko7:
        $Kf = get_called_class();
        if (array_key_exists($Kf, self::$constCacheArray)) {
            goto fz6;
        }
        $XZ = new ReflectionClass($Kf);
        self::$constCacheArray[$Kf] = $XZ->getConstants();
        fz6:
        return self::$constCacheArray[$Kf];
    }
    public static function isValidName($nU, $lV = false)
    {
        $wD = self::getConstants();
        if (!$lV) {
            goto CHx;
        }
        return array_key_exists($nU, $wD);
        CHx:
        $NW = array_map("\x73\164\162\x74\157\x6c\157\167\145\162", array_keys($wD));
        return in_array(strtolower($nU), $NW);
    }
    public static function isValidValue($GT, $lV = true)
    {
        $oM = array_values(self::getConstants());
        return in_array($GT, $oM, $lV);
    }
}
