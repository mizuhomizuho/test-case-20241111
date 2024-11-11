<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 */

use \Bitrix\Main\Text\HtmlFilter;

if (!$arResult['ADMIN_USERS']) {
    return;
}

?>
<table class="table">
    <tr>
        <th>Логин</th>
        <th>Email</th>
        <th>Имя</th>
        <th>Фамилия</th>
    </tr>
    <?php
    foreach ($arResult['ADMIN_USERS'] as $user) {
        ?>
        <tr>
            <td><?=HtmlFilter::encode($user['LOGIN'])?></td>
            <td><?=HtmlFilter::encode($user['EMAIL'])?></th>
            <td><?=HtmlFilter::encode($user['NAME'])?></td>
            <td><?=HtmlFilter::encode($user['LAST_NAME'])?></td>
        </tr>
        <?php
    }
    ?>
</table>
