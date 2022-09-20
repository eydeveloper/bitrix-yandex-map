<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

use App\Seeder\OfficeSeeder;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

try {
    (new OfficeSeeder())->run();
} catch (ObjectPropertyException|ArgumentException|SystemException $e) {
    echo $e->getMessage();
}
