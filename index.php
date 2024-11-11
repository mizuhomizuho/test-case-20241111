<?php

/**
 * @var $APPLICATION
 */

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

?>

<h5>1. Есть таблица Users (тестирование на знание SQL)</h5>
<hr>

<?php $APPLICATION->IncludeComponent(
    "testCase20241111:users.sql.join",
    "",
    array(
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
    ),
    false
);?>

<br>

<h5>3. Выводить всех пользователей на страницу из группы Администратор</h5>
<hr>

<?php $APPLICATION->IncludeComponent(
    "testCase20241111:admin.users",
    "",
    array(
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
    ),
    false
);?>

<br>

<h5>4. Выводить список товаров из любого раздела</h5>
<hr>

<?php $APPLICATION->IncludeComponent(
	"testCase20241111:section.items", 
	".default", 
	array(
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_ID" => "2",
		"SECTION_ID" => "7"
	),
	false
);?>

<br>

<h5>5. Написать форму обратной связи</h5>
<hr>

<?php $APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	".default", 
	array(
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"COMPONENT_TEMPLATE" => ".default",
		"WEB_FORM_ID" => "1",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "N",
		"SEF_MODE" => "N",
		"LIST_URL" => "result_list.php",
		"EDIT_URL" => "result_edit.php",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");