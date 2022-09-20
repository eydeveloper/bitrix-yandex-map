<?php

namespace App\Model\Iblock;

use App\Helper\IblockHelper;
use Bitrix\Iblock\Iblock;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

class IblockRepository
{
    /**
     * @throws ObjectPropertyException
     * @throws SystemException
     * @throws ArgumentException
     */
    protected function getEntityDataClass(): string
    {
        $iblockId = IblockHelper::getIblockId($this->iblockCode);

        return Iblock::wakeUp($iblockId)->getEntityDataClass();
    }
}
