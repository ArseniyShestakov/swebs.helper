<?php

namespace Swebs\Helper\Iblock;

use Bitrix\Main\Loader;
use Bitrix\Main\SystemException;

Loader::includeModule('iblock');

class Section
{
    private static $arSections;

    public static function delete($arIDs)
    {
        if (!is_array($arIDs)) {
            $arIDs = array($arIDs);
        }

        foreach ($arIDs as $intID) {
            \CIBlockSection::Delete($intID);
        }

        return;
    }

    public static function getFieldsByID($intSectionID, $strFieldName = '')
    {
        if (empty($intSectionID)) {
            throw new SystemException('$intSectionID is required');
        }

        if (!empty(self::$arSections[$intSectionID]['FIELDS'])) {
            $arFields = self::$arSections[$intSectionID]['FIELDS'];
            if (empty($strFieldName)) {
                return $arFields;
            } else {
                return $arFields[$strFieldName];
            }
        }

        $dbSection = \CIBlockSection::GetByID($intSectionID);

        if ($arFields = $dbSection->GetNext()) {
            self::$arSections[$intSectionID]['FIELDS'] = $arFields;

            if (empty($strFieldName)) {
                return $arFields;
            } else {
                return $arFields[$strFieldName];
            }
        }
        return false;
    }

}