<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

use App\Seeder\OfficeSeeder;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

try {
    Loader::includeModule('iblock');
} catch (LoaderException $e) {
    echo $e->getMessage();
    return;
}

try {
    (new OfficeSeeder())->run();
} catch (ObjectPropertyException|ArgumentException|SystemException $e) {
    echo $e->getMessage();
}
