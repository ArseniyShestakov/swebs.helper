<?php

namespace Swebs\Helper\Others;

use Bitrix\Main\Context;
use Bitrix\Main\Web;

class Cookie
{
    public static function getCookie($strName = false)
    {
        $obRequest = Context::getCurrent()->getRequest();
        if ($strName === false) {
            return $obRequest->getCookieList();
        }

        return $obRequest->getCookie($strName);
    }

    public static function setCookie($strName, $strValue, $strDomain = '')
    {
        $obContext = Context::getCurrent();
        $obCookie = new Web\Cookie($strName, $strValue);
        if (!empty($strDomain)) {
            $obCookie->setDomain($strDomain);
        }
        $obContext->getResponse()->addCookie($obCookie);
    }
}