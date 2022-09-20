<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

use App\Migration\OfficeMigration;

(new OfficeMigration())->run();
