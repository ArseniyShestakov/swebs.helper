<?php

namespace Swebs\Helper\Sale;

use Bitrix\Main\Loader;

Loader::includeModule('sale');

class Order
{
    public static function GetPropertyValueByCode($obOrder, $strCode)
    {
        $strValue = '';
        $obPropertyCollection = $obOrder->getPropertyCollection();
        foreach ($obPropertyCollection as $obProperty) {
            if ($obProperty->getField('CODE') == $strCode) {
                $strValue = $obProperty->getField('VALUE');
                break;
            }
        }

        return $strValue;
    }

    public static function SetPropertyValueByCode($obOrder, $strCode, $strValue)
    {
        $obPropertyCollection = $obOrder->getPropertyCollection();
        foreach ($obPropertyCollection as $obProperty) {
            if ($obProperty->getField('CODE') == $strCode) {
                $obProperty->setValue($strValue);
                break;
            }
        }

        return true;
    }
}