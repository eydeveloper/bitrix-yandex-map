<?php

namespace App\Components;

use Bitrix\Iblock\Elements\ElementOfficesTable;
use Bitrix\Main\Data\Cache;
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
        $cache = Cache::createInstance();
        $offices = [];

        if ($cache->initCache(7200, 'yandex.map.offices')) {
            $offices = $cache->getVars();
        } elseif ($cache->startDataCache()) {
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
            $cache->endDataCache($offices);
        }

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
