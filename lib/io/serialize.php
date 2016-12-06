<?php

namespace Swebs\Helper\IO;

class Serialize
{
    public static function Write($strName, $obData)
    {
        $strPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $strName . '.dat';
        $strData = serialize($obData);
        file_put_contents($strPath, $strData);

        return true;
    }

    public static function Ride($strName)
    {
        $strPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $strName . '.dat';
        $strData = file_get_contents($strPath);
        $obData = unserialize($strData);

        return $obData;
    }
}