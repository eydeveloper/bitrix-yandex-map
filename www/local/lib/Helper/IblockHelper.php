<?php

namespace App\Helper;

use Bitrix\Iblock\IblockTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

class IblockHelper
{
    /**
     * Метод возвращает идентификатор инфоблока по символьному коду.
     *
     * @param string $code
     * @return int
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getIdByCode(string $code): int
    {
        return IblockTable::query()
            ->addSelect('ID')
            ->addFilter('CODE', $code)
            ->fetch()['ID'];
    }
}
