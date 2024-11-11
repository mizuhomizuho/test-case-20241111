<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 */

use \Bitrix\Main\Text\HtmlFilter;

if (!$arResult['USERS']) {
    return;
}

?>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Имя группы</th>
    </tr>
    <?php
    foreach ($arResult['USERS'] as $user) {
        ?>
        <tr>
            <td><?=$user['ID']?></td>
            <td><?=HtmlFilter::encode($user['NAME'])?></td>
            <td><?=HtmlFilter::encode($user['GROUP_NAME'])?></td>
        </tr>
        <?php
    }
    ?>
</table>
