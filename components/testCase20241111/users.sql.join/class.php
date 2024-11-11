<?php

namespace TestCase20241111UsersSqlJoin;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Entity\ReferenceField;
use TestCase20241111\UsersTable;
use TestCase20241111\GroupsTable;

Loader::includeModule('main');

class Component extends \CBitrixComponent
{
    private const NEED_GROUP_ID = 1;

    public function executeComponent(): void
    {
        if ($this->startResultCache()) {

            $this->arResult = [];

            $usersQuery = UsersTable::getList([
                'select' => [
                    'ID',
                    'NAME',
                    'GROUP_NAME' => 'USER_GROUP.NAME',
                ],
                'filter' => [
                    'USER_GROUP.ID' => static::NEED_GROUP_ID,
                ],
                'runtime' => [
                    new ReferenceField(
                        'USER_GROUP',
                        GroupsTable::class,
                        ['=this.GROUP_ID' => 'ref.ID']
                    ),
                ]
            ]);

            $this->arResult['USERS'] = $usersQuery->fetchAll();

            $this->IncludeComponentTemplate();
        }
    }
}