<?php

namespace App\Components;

use Bitrix\Iblock\Elements\ElementOfficesTable;
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
        $offices = ElementOfficesTable::query()
            ->setSelect([
                'ID',
                'NAME',
                'PHONE_' => 'PHONE',
                'EMAIL_' => 'EMAIL',
                'COORDINATES_' => 'COORDINATES',
                'CITY_' => 'CITY',
            ])
            ->fetchAll();

        return [
            'offices' => $offices,
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
