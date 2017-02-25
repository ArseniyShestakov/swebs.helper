<?php

namespace Swebs\Helper\Iblock;

use Bitrix\Main\Loader;

Loader::includeModule('iblock');


class Property
{
    static public function getIdByName($intIblockID, $strName, $arParams = array())
    {
        $arFilter = array(
            'IBLOCK_ID' => $intIblockID,
            'NAME' => $strName
        );
        $dbProperty = \CIBlockProperty::GetList(array(), $arFilter);
        if ($arFields = $dbProperty->GetNext()) {
            return $arFields['ID'];
        }

        // add property
        $arFields = Array(
            'IBLOCK_ID' => $intIblockID,
            'NAME' => $strName
        );
        if (!empty($arParams)) {
            $arFields = array_merge($arFields, $arParams);
        }

        $obProperty = new \CIBlockProperty;
        $intId = $obProperty->Add($arFields);

        return $intId;
    }

    static public function getIdEnumValue($intIblockID, $strPropertyName, $strValueName)
    {
        // get property
        $arParams = array(
            'PROPERTY_TYPE' => 'L',
        );
        $intPropertyID = self::getIdByName($intIblockID, $strPropertyName, $arParams);

        // get value
        $intValueID = 0;
        if ($intPropertyID !== false) {
            $arFilter = array(
                'VALUE' => $strValueName,
                'IBLOCK_ID' => $intIblockID,
                'PROPERTY_ID' => $intPropertyID
            );
            $dbEnum = \CIBlockPropertyEnum::GetList(array(), $arFilter);
            if ($arFields = $dbEnum->GetNext()) {
                $intValueID = $arFields['ID'];
            }

            if (empty($intValueID)) {
                $obEnum = new \CIBlockPropertyEnum;
                $arFields = array(
                    'PROPERTY_ID' => $intPropertyID,
                    'VALUE' => $strValueName
                );
                $intValueID = $obEnum->Add($arFields);
            }
        }

        $arOut = array(
            'PROPERTY' => $intPropertyID,
            'VALUE' => $intValueID
        );

        return $arOut;
    }
}