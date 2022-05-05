<?php

include 'token.php';

$idEmployee = 'fe34b355-cc24-11ec-0a80-04d00080a3fe';
$link = 'https://online.moysklad.ru/api/remap/1.2/entity/employee/' . $idEmployee;

$headers = [
    'Authorization: Bearer ' . $token,
];

/**
 * Нам необходимо инициировать запрос к серверу.
 * Воспользуемся библиотекой cURL (поставляется в составе PHP).
 * Вы также можете использовать и кроссплатформенную программу cURL, если вы не программируете на PHP.
 */
$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
/** Устанавливаем необходимые опции для сеанса cURL  */
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');

curl_exec($curl); //Инициируем запрос к API
