<?php
CModule::AddAutoloadClasses(
    'swebs.helper',
    array(
        'Swebs\Helper\Highload\Element' => 'lib/highload/element.php',
        'Swebs\Helper\IO\Serialize' => 'lib/io/serialize.php',
        'Swebs\Helper\Iblock\Element' => 'lib/iblock/element.php',
        'Swebs\Helper\Sale\Order' => 'lib/sale/order.php',
        'Swebs\Helper\Others\Strings' => 'lib/others/string.php',
    )
);