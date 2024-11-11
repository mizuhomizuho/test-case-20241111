<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 */

use \Bitrix\Main\Text\HtmlFilter;

if (!$arResult['PRODUCTS']) {
    return;
}

?>
<table class="table">
    <tr>
        <th>ID товара</th>
        <th>Название товара</th>
    </tr>
    <?php
    foreach ($arResult['PRODUCTS'] as $product) {
        ?>
        <tr>
            <td><?=$product['ID']?></td>
            <td><?=HtmlFilter::encode($product['NAME'])?></td>
        </tr>
        <?php
    }
    ?>
</table>
