<?php

namespace TestCase20241111;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Validators\LengthValidator;

/**
 * Class UsersTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> NAME string(255) mandatory
 * <li> GROUP_ID int mandatory
 * </ul>
 *
 * @package Bitrix\Case
 **/
class UsersTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'test_case_20241111_users';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            new IntegerField(
                'ID',
                [
                    'primary' => true,
                    'autocomplete' => true,
                ]
            ),
            new StringField(
                'NAME',
                [
                    'required' => true,
                    'validation' => function () {
                        return [
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ),
            new IntegerField(
                'GROUP_ID',
                [
                    'required' => true,
                ]
            ),
        ];
    }
}