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
Element::getElement($intIblockID, $arFilter = array(), $arSelect = array(), $intLimit = 0)
```
_Возвращает элементы Highload инфоблока в виде массива. При необходимости можно использовать фильтрацию, указать нужные поля и ограничить количество._
```php
Element::update($intIblockID, $intElementID, $arUpdate)
```
_Обновляет элемент Highload инфоблока. Принимает на вход id инфоблока, id элемента и массив полей со значениями. Можно передавать только то поле которое необходимо обновить. Возвращает объект результата._
```php
Element::add($intIblockID, $arFields)
```
_Добавляет новый элемент Highload инфоблока. Принимает на вход id инфоблока и массив полей со значениями. Возвращает объект результата._

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
```php
Element::deactivate($arIDs)
```
_Деактивирует элементы инфоблока id которых переданы в массиве. В случае успеха возвращает true, или false в лучае неудачи._
```php
Element::activate($arIDs)
```
_Активирует элементы инфоблока id которых переданы в массиве. В случае успеха возвращает true, или false в лучае неудачи._

## Swebs\Helper\Iblock\Section
```php
Section::delete($arIDs)
```
_Пакетное удаление разделов информационных блоков._
```php
Section::getFieldsByID($intSectionID, $strFieldName = '')
```
_Возвращает конкретное поле или массив полей раздела информационного блока._

## Swebs\Helper\Iblock\Property
```php
Property::getIdByName($intIblockID, $strName, $arParams = array())
```
_Возвращает ID свойства инфоблока по его имени. Если совойство с таким именем не найдено то оно будет создано. В массиве $arParams можно передать поля для нового свойства._
```php
Property::getIdEnumValue($intIblockID, $strPropertyName, $strValueName)
```
_Возвращает ID свойства-списка инфоблока по его имени и ID варианта значения так же по его имени в виде массива. Если совойство с таким именем не найдено то оно будет создано. Если искомый вариант значения не найден то он будет создан._

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
```php
Order::getDeliveries($intUserID = NULL)
```
_Возвращает массив объектов доставок с учётом ограничений. Если id пользователя не будет передан то произойдёт попытка получить его из глобального объекта, в случае неудачи будет создан аноним._
```php
Order::getPaySystems($intUserID = NULL, $intDeliveryID = false)
```
_Возвращает массив платёжных систем с учётом ограничений. Если id пользователя не будет передан то произойдёт попытка получить его из глобального объекта, в случае неудачи будет создан аноним. Необходимо передать id службы доставки если используется ограничение по доставке._
```php
Order::simpleOrder($intUserID = NULL, $arProperties)
```
_Создаёт простой заказ. Если id пользователя не будет передан то произойдёт попытка получить его из глобального объекта, в случае неудачи будет создан аноним. Массив $arProperties обязательно должен имет заполненными ключи 'DELIVERY_ID', 'PAYMENT_ID'. Из не обязательных 'PERSONAL_ID', 'COUPON'. Так же можно передать в ключе 'ORDER_PROPERTIES' масив со свойствами заказа, а в ключе 'ORDER_FIELDS' массив с полями заказа. Массив должен иметь формат 'CODE' => 'VALUE'. Метод создавался для часто используемого функционала "Заказ в один клик". Для более сложной задачи создания заказа он вряд ли подойдёт._
```php
Order::byOneClick($intUserID = NULL, $arProperties)
```
_Создаёт быстрый заказ. От предыдущего метода отличается необходимостью передать в ключе 'PRODUCT_ID' в массиве $arProperties идентификатор товара. Метод создавался для часто используемого функционала "Заказ в один клик"._

## Swebs\Helper\Sale\Price
```php
Price::setMinMax($intIblockElementID, $intCatalogGroupID, $strMaxPropertyName = 'MAXIMUM_PRICE', $strMinPropertyName = 'MINIMUM_PRICE')
```
_Заполняет указанные свойства товара минимальной и максимальной ценой из всех имеющихся предложений данного товара._
```php
Price::add($intProductID, $intPriceTypeID, $floatPrice, $strCurrency = 'RUB')
```
_Устанавливает для товара $intProductID цену типа $intPriceTypeID в значение $floatPrice. Если цена есть то обновлет. Если нет - добавляет._

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

## Swebs\Helper\Others\DateTime
```php
DateTime::getInterval($obFirstData, $obSecondData)
```
_Принимает два объекта Bitrix\Main\Type\DateTime и возвращает массив с разницей. Ключи возвращаемого массива: 0 - секунды; 1 - минуты; 2 - часы; 3 - дни; 4 - года._

## Swebs\Helper\Main\User
```php
User::getID($isAllowAnonymous = false)
```
_Возвращает id текущего пользователя или NULL, если передан параметр $isAllowAnonymous как true, то в случае отутсвия пользователя создаст анонима и вернёт его id._
```php
User::getByLogin($strLogin, $arParams = array())
```
_Возвращает массив с параметрами пользователя соответствущими переданному логину или false. Если пользователь не найден и передан массив $arParams то создаётся новые из полей этого массива_