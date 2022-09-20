<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Главная');
?>

<? $APPLICATION->IncludeComponent('app:yandex.map', '.default', []); ?>

<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
?>