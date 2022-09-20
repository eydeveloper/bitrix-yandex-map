<?php

namespace App\Seeder;

use App\Helper\IblockHelper;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use CIBlockElement;

class OfficeSeeder
{
    /**
     * @return void
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function run(): void
    {
        $iblockId = IblockHelper::getIdByCode(IBLOCK_OFFICES_CODE);

        $offices = [
            [
                'NAME' => 'Офис 1',
                'IBLOCK_ID' => $iblockId,
                'PROPERTY_VALUES' => [
                    'PHONE' => '+7 800 500-10-10',
                    'EMAIL' => 'office1@email.com',
                    'COORDINATES' => '55.684758 37.738521',
                    'CITY' => 'Москва',
                ],
            ],
            [
                'NAME' => 'Офис 2',
                'IBLOCK_ID' => $iblockId,
                'PROPERTY_VALUES' => [
                    'PHONE' => '+7 800 500-20-20',
                    'EMAIL' => 'office2@email.com',
                    'COORDINATES' => '55.833436 37.715175',
                    'CITY' => 'Москва',
                ],
            ],
            [
                'NAME' => 'Офис 3',
                'IBLOCK_ID' => $iblockId,
                'PROPERTY_VALUES' => [
                    'PHONE' => '+7 800 500-30-30',
                    'EMAIL' => 'office3@email.com',
                    'COORDINATES' => '55.687086 37.529789',
                    'CITY' => 'Москва',
                ],
            ],
            [
                'NAME' => 'Офис 4',
                'IBLOCK_ID' => $iblockId,
                'PROPERTY_VALUES' => [
                    'PHONE' => '+7 800 500-40-40',
                    'EMAIL' => 'office4@email.com',
                    'COORDINATES' => '55.782392 37.614924',
                    'CITY' => 'Москва',
                ],
            ],
            [
                'NAME' => 'Офис 5',
                'IBLOCK_ID' => $iblockId,
                'PROPERTY_VALUES' => [
                    'PHONE' => '+7 800 500-50-50',
                    'EMAIL' => 'office5@email.com',
                    'COORDINATES' => '55.642063 37.656123',
                    'CITY' => 'Москва',
                ],
            ],
            [
                'NAME' => 'Офис 6',
                'IBLOCK_ID' => $iblockId,
                'PROPERTY_VALUES' => [
                    'PHONE' => '+7 800 500-60-60',
                    'EMAIL' => 'office6@email.com',
                    'COORDINATES' => '55.826479 37.487208',
                    'CITY' => 'Москва',
                ],
            ],
        ];

        $iblockElement = new CIBlockElement();

        foreach ($offices as $office) {
            $iblockElement->Add($office);
        }
    }
}
