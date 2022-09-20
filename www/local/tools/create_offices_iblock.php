<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

use App\Migration\OfficeMigration;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;

try {
    Loader::includeModule('iblock');
} catch (LoaderException $e) {
    echo $e->getMessage();
    return;
}

(new OfficeMigration())->run();
