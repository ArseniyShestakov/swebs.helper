<?php
CModule::AddAutoloadClasses(
    'swebs.helper',
    array(
        'Swebs\Helper\Highload\Element' => 'lib/highload/element.php',
        'Swebs\Helper\IO\Serialize' => 'lib/io/serialize.php',
        'Swebs\Helper\Iblock\Element' => 'lib/iblock/element.php',
        'Swebs\Helper\Iblock\Section' => 'lib/iblock/section.php',
        'Swebs\Helper\Iblock\Property' => 'lib/iblock/property.php',
        'Swebs\Helper\Sale\Order' => 'lib/sale/order.php',
        'Swebs\Helper\Sale\Price' => 'lib/sale/price.php',
        'Swebs\Helper\Sale\Basket' => 'lib/sale/basket.php',
        'Swebs\Helper\Others\Strings' => 'lib/others/string.php',
        'Swebs\Helper\Others\Cookie' => 'lib/others/cookie.php',
        'Swebs\Helper\Others\DateTime' => 'lib/others/datetime.php',
        'Swebs\Helper\Others\Image' => 'lib/others/image.php',
        'Swebs\Helper\Main\User' => 'lib/main/user.php',
        'Swebs\Helper\Main\Debug' => 'lib/main/debug.php',
        'Swebs\Helper\Main\GarbageStorage' => 'lib/main/garbage_storage.php'
    )
);