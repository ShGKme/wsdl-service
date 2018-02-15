<?php
// Выключаем кеш, иначе wsdl не обновляется после изменения...
ini_set("soap.wsdl_cache_enabled", "0");

require "Univer.php";

$server = new SoapServer("Univer.wsdl");
$server->setClass("Univer");
$server->handle();
