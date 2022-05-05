<?php

include 'token.php';

$idEmployee1 = '89452cc2-cc27-11ec-0a80-061600819739';
$idEmployee2 = '8dc904dc-cc25-11ec-0a80-061600818206';

$link = 'https://online.moysklad.ru/api/remap/1.2/entity/employee/delete';

$headers = [
    'Authorization: Bearer ' . $token,
    'Content-Type: application/json'
];

$params = [
    [   
        'meta' => [
            'href'=> 'https://online.moysklad.ru/api/remap/1.2/entity/employee/' . $idEmployee1,
            'type'=> 'employee',
        ]
    ],
    [
        'meta' => [
            'href'=> 'https://online.moysklad.ru/api/remap/1.2/entity/employee/' . $idEmployee2,
            'type'=> 'employee',
        ]
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
