<?php

include 'token.php';

$idEmployee1 = '1885fd9d-cc25-11ec-0a80-061600817d1a';
$idEmployee2 = '1bae8a19-cc25-11ec-0a80-00f60081776b';

$link = 'https://online.moysklad.ru/api/remap/1.2/entity/employee';

$headers = [
    'Authorization: Bearer ' . $token,
    'Content-Type: application/json'
];
$params = [
    [   
        'id' => $idEmployee1,
        'firstName' => 'Артём',
    ],
    [   
        'id' => $idEmployee2,
        'firstName' => 'Сергей',
    ],
];

$jsonParams = json_encode($params, JSON_UNESCAPED_UNICODE);

/**
 * Нам необходимо инициировать запрос к серверу.
 * Воспользуемся библиотекой cURL (поставляется в составе PHP).
 * Вы также можете использовать и кроссплатформенную программу cURL, если вы не программируете на PHP.
 */
$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
/** Устанавливаем необходимые опции для сеанса cURL  */
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonParams);

curl_exec($curl); //Инициируем запрос к API
