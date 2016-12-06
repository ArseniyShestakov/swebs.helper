<?php

namespace Swebs\Helper\Iblock;

use Bitrix\Main\Loader;

Loader::includeModule('iblock');

class Element
{
    public static function Delete($mixID)
    {
        $arIDs = $mixID;
        if (!is_array($mixID)) {
            $arIDs = array($mixID);
        }

        foreach ($arIDs as $intID) {
            \CIBlockElement::Delete($intID);
        }

        return;
    }
}