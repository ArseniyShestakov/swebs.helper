<?php

namespace Swebs\Helper\Sale;

use Bitrix\Currency\CurrencyManager;
use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Sale;

Loader::includeModule('sale');

class Basket
{
    public static function clean(Sale\Basket $obBasket)
    {
        if (empty($obBasket)) {
            throw new SystemException('Missing required "$obBasket"');
        }
        foreach ($obBasket as $obItem) {
            $obItem->delete();
            $obBasket->save();
        }
    }

    public static function add($intProductID, $intQuantity = 1)
    {
        $obContext = Context::getCurrent();

        $obBasket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), $obContext->getSite());
        if ($obItem = $obBasket->getExistsItem('catalog', $intProductID)) {
            $obItem->setField('QUANTITY', $obItem->getQuantity() + $intQuantity);
        } else {
            $obItem = $obBasket->createItem('catalog', $intProductID);
            $obItem->setFields(array(
                'QUANTITY' => $intQuantity,
                'CURRENCY' => CurrencyManager::getBaseCurrency(),
                'LID' => $obContext->getSite(),
                'PRODUCT_PROVIDER_CLASS' => 'CCatalogProductProvider',
            ));
        }
        $obBasket->save();
    }

    public static function count()
    {
        $obContext = Context::getCurrent();

        $obBasket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), $obContext->getSite());

        return $obBasket->count();
    }
}