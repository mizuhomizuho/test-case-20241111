<?php

namespace TestCase20241111AdminUsers;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\UserGroupTable;
use Bitrix\Main\UserTable;

Loader::includeModule('main');

class Component extends \CBitrixComponent
{
    private const ADMIN_GROUP_ID = 1;

    public function executeComponent(): void
    {
        if ($this->startResultCache()) {

            $adminUsers = UserTable::getList([
                'select' => ['LOGIN', 'EMAIL', 'NAME', 'LAST_NAME'],
                'filter' => [
                    'USER_GROUP.GROUP_ID' => static::ADMIN_GROUP_ID,
                ],
                'runtime' => [
                    new ReferenceField(
                        'USER_GROUP',
                        UserGroupTable::class,
                        ['=this.ID' => 'ref.USER_ID']
                    ),
                ]
            ]);

            $this->arResult = [];
            $this->arResult['ADMIN_USERS'] = $adminUsers->fetchAll();

            $this->IncludeComponentTemplate();
        }
    }
}