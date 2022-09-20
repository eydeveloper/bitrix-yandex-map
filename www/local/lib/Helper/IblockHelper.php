<?php

namespace App\Helper;

use Bitrix\Iblock\IblockTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

class IblockHelper
{
    /**
     * @throws ObjectPropertyException
     * @throws SystemException
     * @throws ArgumentException
     */
    public static function getIblockId(string $iblockCode): int
    {
        return IblockTable::query()
            ->addSelect('ID')
            ->addFilter('CODE', $iblockCode)
            ->fetch()['ID'];
    }
}
