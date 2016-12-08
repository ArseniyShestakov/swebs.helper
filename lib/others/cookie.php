<?php

namespace Swebs\Helper\Others;

use Bitrix\Main\Context;

class Cookie
{
    public static function getCookie($strName = false)
    {
        $obRequest = Context::getCurrent()->getRequest();
        $obOut = '';
        if ($strName === false) {
            $obOut = $obRequest->getCookieList();
        } else {
            $obOut = $obRequest->getCookie($strName);
        }

        return $obOut;
    }

    public static function setCookie($strName, $strValue, $strDomain = '')
    {
        $obContext = Context::getCurrent();
        $obCookie = new Cookie($strName, $strValue);
        if (!empty($strDomain)) {
            $obCookie->setDomain($strDomain);
        }
        $obContext->getResponse()->addCookie($obCookie);
    }
}