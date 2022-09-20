<?php

namespace App\Components;

use App\Model\Iblock\Office\OfficeRepository;
use Bitrix\Main\Engine\Contract\Controllerable;
use CBitrixComponent;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

class YandexMapComponent extends CBitrixComponent implements Controllerable
{
    public function configureActions(): array
    {
        return [
            'getOffices' => [
                'prefilters' => [],
            ],
        ];
    }

    public function getOfficesAction(): array
    {
        return [
            'offices' => (new OfficeRepository())->getForMap(),
        ];
    }

    public function executeComponent(): void
    {
        $this->includeComponentTemplate();
    }
}
