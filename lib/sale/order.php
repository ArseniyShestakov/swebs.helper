<?php

namespace Swebs\Helper\Sale;

use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Sale;

Loader::includeModule('sale');

class Order
{
    public static function getPropertyValueByCode($obOrder, $strCode)
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

    public static function setPropertyValueByCode($obOrder, $strCode, $strValue)
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

    public static function getDeliveries($intUserID = NULL)
    {
        global $USER;

        if ($intUserID == NULL) {
            $intUserID = $USER->GetID();
        }

        if ($intUserID == NULL) {
            $intUserID = \CSaleUser::GetAnonymousUserID();
        }

        $strSiteId = Context::getCurrent()->getSite();
        $obOrder = Sale\Order::create($strSiteId, $intUserID);

        $obShipment = $obOrder->getShipmentCollection()->createItem();
        $arDelivery = Sale\Delivery\Services\Manager::getRestrictedObjectsList($obShipment);

        return $arDelivery;
    }

    public static function getPaySystems($intUserID = NULL, $intDeliveryID = false)
    {
        global $USER;

        if ($intUserID == NULL) {
            $intUserID = $USER->GetID();
        }

        if ($intUserID == NULL) {
            $intUserID = \CSaleUser::GetAnonymousUserID();
        }

        $strSiteId = Context::getCurrent()->getSite();
        $obOrder = Sale\Order::create($strSiteId, $intUserID);

        if (is_numeric($intDeliveryID)) {
            $obShipment = $obOrder->getShipmentCollection()->createItem();
            $obShipment->setField('DELIVERY_ID', $intDeliveryID);
        }

        $obPayment = $obOrder->getPaymentCollection()->createItem();
        $arPayment = Sale\PaySystem\Manager::getListWithRestrictions($obPayment);

        return $arPayment;
    }
}