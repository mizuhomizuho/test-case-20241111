<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = array(
    'GROUPS' => array(
        'PARAMS' => array(
            'NAME' => 'Настройки'
        ),
    ),
    'PARAMETERS' => array(
        'IBLOCK_ID' => array(
            'PARENT' => 'PARAMS',
            'NAME' => 'ID инфоблока',
            'TYPE' => 'STRING',
        ),
        'SECTION_ID' => array(
            'PARENT' => 'PARAMS',
            'NAME' => 'ID раздела',
            'TYPE' => 'STRING',
        ),
    ),
);