# swebs.helper
Модуль для [1С-Битрикс](http://www.1c-bitrix.ru/). Он не несёт в себе ничего нового, кроме "синтаксического сахара" используемого автором [API](http://dev.1c-bitrix.ru/api_help/) cms [1С-Битрикс](http://www.1c-bitrix.ru/).

Распространяется под лицензией [MIT](https://en.wikipedia.org/wiki/MIT_License). Автор не принимает на себя никаких гарантийных обязательств в отношении данного модуля и не несет ответственности за:

  * любой прямой или косвенный ущерб и упущенную выгоду, даже если это стало результатом использования или невозможности использования модуля;
  * убытки, включая общие, предвидимые, реальные, прямые, косвенные и прочие убытки, включая утрату или искажение информации, убытки, понесенные Пользователем или третьими лицами, невозможность работы модуля и несовместимость с любым другим модулем и т.д.
  * за любые повреждения оборудования или программного обеспечения Пользователя, возникшие в результате использовании модуля.

-----------------------------------

**Краткий перечень классов и методов:**

## Swebs\Helper\Highload\Element
```php
Element::getElement($intIblockID, $arFilter, $arSelect, $intLimit)
```
_Возвращает элементы Highload инфоблока в виде массива. При необходимости можно использовать фильтрацию, указать нужные поля и ограничить количество._

## Swebs\Helper\Iblock\Element
```php
Element::delete($arIDs)
```
_Пакетное удаление элементов информационных блоков._
```php
Element::getFieldsByID($intElementID, $strFieldName = '')
```
_Возвращает конкретное поле или массив полей элемента информационного блока._
```php
Element::getPropertiesByID($intElementID, $strPropertyName = '')
```
_Возвращает конкретное свойство или массив свойств элемента информационного блока._

## Swebs\Helper\IO\Serialize
```php
Serialize::write($strName, $obData)
```
_Сохраняет любой объект в виде файла в upload_
```php
Serialize::ride($strName)
```
_Получает любой сохранённый предыдущим методом объект из файла в upload._

## Swebs\Helper\Sale\Order
```php
Order::getPropertyValueByCode($obOrder, $strCode)
```
_Возвращает значение свойства заказа. На вход принимает объект заказа ([d7](http://dev.1c-bitrix.ru/api_d7/bitrix/sale/order/index.php)) и символьный код свойства._
```php
Order::setPropertyValueByCode($obOrder, $strCode, $strValue)
```
_Записывает значение свойства заказа. На вход принимает объект заказа ([d7](http://dev.1c-bitrix.ru/api_d7/bitrix/sale/order/index.php)), символьный код свойства и значение._

## Swebs\Helper\Sale\Price
```php
Price::setMinMax($intIblockElementID, $intCatalogGroupID, $strMaxPropertyName = 'MAXIMUM_PRICE', $strMinPropertyName = 'MINIMUM_PRICE')
```
_Заполняет указанные свойства товара минимальной и максимальной ценой из всех имеющихся предложений данного товара._

## Swebs\Helper\Others\Cookie
```php
Cookie::getCookie($strName = false)
```
_Получает конктретно указанный cookie или массив всех имеющихся._
```php
Cookie::setCookie($strName, $strValue, $strDomain = '')
```
_Записывает данные в cookie._

## Swebs\Helper\Others\Strings
```php
Strings::getStringOfNum($intNum)
```
_Возвращает прописью переданное число._