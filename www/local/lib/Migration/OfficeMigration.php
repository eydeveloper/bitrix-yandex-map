<?php

namespace App\Migration;

use Bitrix\Iblock\PropertyTable;
use CIBlock;
use CIBlockType;
use Exception;

class OfficeMigration
{
    /**
     * Метод создает тип инфоблока «Контент» и инфоблок «Офисы».
     *
     * @return void
     */
    public function run(): void
    {
        (new CIBlockType())->Add([
            'ID' => 'content',
            'SECTIONS' => 'N',
            'LANG' => [
                'ru' => [
                    'NAME' => 'Контент',
                    'ELEMENT_NAME' => 'Элементы',
                ],
            ],
        ]);

        $iblockId = (new CIBlock())->Add([
            'LID' => 's1',
            'CODE' => 'offices',
            'API_CODE' => 'offices',
            'IBLOCK_TYPE_ID' => 'content',
            'NAME' => 'Офисы',
            'INDEX_ELEMENT' => 'N',
            'WORKFLOW' => 'N',
        ]);

        $properties = [
            [
                'CODE' => 'PHONE',
                'IBLOCK_ID' => $iblockId,
                'NAME' => 'Телефон',
            ],
            [
                'CODE' => 'EMAIL',
                'IBLOCK_ID' => $iblockId,
                'NAME' => 'Email',
            ],
            [
                'CODE' => 'COORDINATES',
                'IBLOCK_ID' => $iblockId,
                'NAME' => 'Координаты',
            ],
            [
                'CODE' => 'CITY',
                'IBLOCK_ID' => $iblockId,
                'NAME' => 'Город',
            ],
        ];

        foreach ($properties as $property) {
            try {
                PropertyTable::add($property);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
