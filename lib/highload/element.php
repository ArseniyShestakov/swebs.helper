<?php

namespace Swebs\Helper\Highload;

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\Loader;

Loader::includeModule('highloadblock');

/**
 * Class Element
 * @package Swebs\Helper\Highload
 */
class Element
{
    /**
     * @param $intIblockID
     * @param $arFilter
     * @param $arSelect
     * @param $intLimit
     * @return array
     */
    public static function GetElement($intIblockID, $arFilter, $arSelect, $intLimit)
    {
        $arHLBlock = HighloadBlockTable::getById($intIblockID)->fetch();
        $obEntity = HighloadBlockTable::compileEntity($arHLBlock);
        $strEntityDataClass = $obEntity->getDataClass();

        $dbData = $strEntityDataClass::getList(array(
            'select' => $arSelect,
            'filter' => $arFilter,
            'limit' => $intLimit,
        ));

        $arElements = $dbData->fetchAll();

        return $arElements;
    }
}