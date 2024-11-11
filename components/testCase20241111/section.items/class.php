<?php

namespace TestCase20241111SectionItems;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock\Iblock;

Loader::includeModule('main');
Loader::includeModule('iblock');

class Component extends \CBitrixComponent
{
    public function executeComponent(): void
    {
        if ($this->startResultCache()) {

            if (!$this->arParams['IBLOCK_ID'] || !$this->arParams['SECTION_ID']) {
                $this->IncludeComponentTemplate();
                return;
            }

            $products = Iblock::wakeUp($this->arParams['IBLOCK_ID'])->getEntityDataClass()::getList([
                    'select' => [
                        'ID',
                        'NAME',
                    ],
                    'filter' => [
                        'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                        'IBLOCK_SECTION_ID' => $this->arParams['SECTION_ID'],
                    ],
                ]);

            $this->arResult = [];
            $this->arResult['PRODUCTS'] = $products->fetchAll();

            $this->IncludeComponentTemplate();
        }
    }
}
