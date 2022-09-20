<?php

namespace App\Model\Iblock\Office;

use App\Model\Iblock\IblockRepository;
use Bitrix\Iblock\Elements\ElementOfficesTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

class OfficeRepository extends IblockRepository
{
    public string $iblockCode = IBLOCK_OFFICES_CODE;

    /**
     * @throws LoaderException
     */
    public function __construct()
    {
        Loader::includeModule('iblock');
    }

    /**
     * Метод возвращает массив объектов офисов для вывода на Яндекс.Карты.
     *
     * @return array
     */
    public function getForMap(): array
    {
        try {
            return $this->getEntityDataClass()::query()
                ->setSelect([
                    'ID',
                    'NAME',
                    'PHONE_' => 'PHONE',
                    'EMAIL_' => 'EMAIL',
                    'COORDINATES_' => 'COORDINATES',
                    'CITY_' => 'CITY',
                ])
                ->fetchAll();
        } catch (ObjectPropertyException|ArgumentException|SystemException $e) {
            return [];
        }
    }
}
