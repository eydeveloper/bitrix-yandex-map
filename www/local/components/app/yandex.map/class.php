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
    /**
     * @return \array[][]
     */
    public function configureActions(): array
    {
        return [
            'getOffices' => [
                'prefilters' => [],
            ],
        ];
    }

    /**
     * Метод возвращает массив со списком офисов.
     *
     * @return array
     */
    public function getOfficesAction(): array
    {
        return [
            'offices' => (new OfficeRepository())->getForMap(),
        ];
    }

    /**
     * @return void
     */
    public function executeComponent(): void
    {
        $this->includeComponentTemplate();
    }
}
